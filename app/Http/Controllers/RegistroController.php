<?php
namespace App\Http\Controllers;
use App\Models\Usuario; 
use App\Models\Persona;
use App\Models\Expediente;
use App\Models\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;



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
                    'curp' => 'required|min:18',
                    'programa' => 'required',
                ]);
    
                
                //PROCEDIMIENTO SQL SERVER INSERTAR SOLICITANTE

                $nombreProcedimiento1= 'ImportarBeneficiados2';
                $curp= $xml->curp;
                $programa = $request->programa;
                $paterno = $xml->paterno;
                $materno = $xml->materno;
                $nombre = $xml->nombre;
                $idperiodo= 1;
                $idmunicipio=28003;
                $arraySolicitante = [$curp, $materno, $paterno, $nombre, $programa, $idperiodo, $idmunicipio];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceStatement($nombreProcedimiento1, $arraySolicitante);
                
                //$nuevoUsuario = new Usuario;
                

                
    
                return redirect()->route('login');
            }
        } else {
            $errorMessage = 'No se pudo realizar la petición';
            return view('layouts.registro', ['errorMessage' => $errorMessage]);
        }
    }

}
