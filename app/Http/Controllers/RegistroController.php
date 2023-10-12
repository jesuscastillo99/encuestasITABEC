<?php


// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use App\Mail\EnviarContraseñaGenerada;
// use App\Models\Usuario; // Asegúrate de importar el modelo 

namespace App\Http\Controllers;
use App\Models\Usuario; // Asegúrate de importar el modelo Usuario adecuadamente
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use GuzzleHttp\Client;
use SimpleXMLElement;


class RegistroController extends Controller
{


    public function registro(Request $request)
    {
        //Solicitud al webservice
        $client = new Client();
        $curpValor = $request->curp;
        $response = $client->get("http://sistemasiceet.tamaulipas.gob.mx/wscurp/wscurp.php?CURP=$curpValor");
    
        if ($response->getStatusCode() == 200) {
            $xmlResponse = $response->getBody()->getContents();
    
            // Procesar la respuesta XML y guardar en "personas"
            $xml = new SimpleXMLElement($xmlResponse);
    
            if (empty($xmlResponse) || $xml->curp == "") {
                $errorMessage = "Tu CURP no fue encontrada en el sistema.";
                return view('layouts.registro', ['errorMessage' => $errorMessage]);
            } else {
                // Validación de datos del formulario
                $request->validate([
                    'curp' => 'required|unique:usuarioslog,curp',
                    'correo' => 'required|email|unique:usuarioslog,correo',
                ]);
    
                // Generación del token
                $activationToken = Str::random(40);
    
                // Crea una nueva instancia del modelo Persona
                $nuevaPersona = new Persona;
                $nuevaPersona->curp = $xml->curp;
                $nuevaPersona->correo = $request->correo;
                $nuevaPersona->paterno = $xml->paterno;
                $nuevaPersona->materno = $xml->materno;
                $nuevaPersona->nombre = $xml->nombre;
                $nuevaPersona->sexo = $xml->sexo;
                $nuevaPersona->fn = $xml->fn;
                $nuevaPersona->idlocalidad = '';
                $nuevaPersona->estadoCivil = '';
                $nuevaPersona->save();
    
                // Crea una nueva instancia del modelo Usuario
                $nuevoUsuario = new Usuario;
                $nuevoUsuario->curp = $xml->curp;
                $nuevoUsuario->correo = $request->correo;
                $nuevoUsuario->activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
                $nuevoUsuario->act_token = $activationToken; // Genera un token de activación
                $nuevoUsuario->save();
    
                // Envía el correo de activación
                Mail::to($nuevoUsuario->correo)->send(new ActivationMail($nuevoUsuario, $activationToken));
    
                return redirect()->route('exito');
            }
        } else {
            $errorMessage = 'No se pudo realizar la petición';
            return view('layouts.registro', ['errorMessage' => $errorMessage]);
        }
    }

}
