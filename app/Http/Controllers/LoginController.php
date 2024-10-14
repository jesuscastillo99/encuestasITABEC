<?php
namespace App\Http\Controllers;
use App\resources\views\auth\login;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;
use SimpleXMLElement;
class LoginController extends Controller
{
    //protected $redirectTo = 'inicio';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function registro(Request $request)
{
    // Solicitud al webservice
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

            try {
                // PROCEDIMIENTO SQL SERVER INSERTAR SOLICITANTE
                $nombreProcedimiento1 = 'EncuestasITABEC.ImportarBeneficiados2';
                $curp = $xml->curp;
                $programa = $request->programa;
                $paterno = $xml->paterno;
                $materno = $xml->materno;
                $nombre = $xml->nombre;
                $idperiodo = 1;
                $idmunicipio = 28003;
                $arraySolicitante = [$curp, $materno, $paterno, $nombre, $programa, $idperiodo, $idmunicipio];
                $procedimiento = new ContadorParametros();
                $resultados = $procedimiento->proceStatement($nombreProcedimiento1, $arraySolicitante); 

                // Si el registro es exitoso, muestra la alerta y redirige a la página externa
                alert()
                    ->success('Registro exitoso', 'Favor de ingresar su CURP nuevamente en la siguiente pantalla')
                    ->showConfirmButton('ACEPTAR', '#3085d6');
                
                // Generar un script de JavaScript para abrir el enlace en una nueva pestaña
                echo "<script>
                    setTimeout(function(){
                         window.open('http://172.31.29.195/cuestionario_itabec/public/?curp={$curp}', '_blank');
                    }, 1000);
                </script>";

                return view('layouts.login');

            } catch (\Exception $e) {
                
                // Capturar y manejar la excepción si el CURP ya existe o hay otro error
                alert()
                    ->error('CURP repetida', 'Favor de ingresar de nuevo su CURP')
                    ->showConfirmButton('ACEPTAR', '#3085d6');
                    return view('layouts.login');
            }
        }
    } else {
        $errorMessage = 'No se pudo realizar la petición';
        return view('layouts.registro', ['errorMessage' => $errorMessage]);
    }
}

    

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('admin/login'); // Redirige al usuario a la página deseada después de cerrar sesión
    }
    
}
