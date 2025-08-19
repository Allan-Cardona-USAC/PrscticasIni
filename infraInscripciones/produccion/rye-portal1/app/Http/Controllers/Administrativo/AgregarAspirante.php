<?php

namespace App\Http\Controllers\Administrativo;
use App\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\Aspirante;
use Carbon\Carbon;
use \Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AgregarAspirante extends Controller
{
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administratico',
        [ 'only' => ['index']]);
    }
    public function index()
    {
        $title = "Agregar Aspirante";
        return view('administrativo.agregarAspirante', compact('title'));
    }

    public function guardarAspirante(Request $request){
        $datosValidos = Validator::make($request->all(), [
            'inputNov' => 'required|numeric',
            'inputPIN' => 'required|string|max:8',
            'inputNombre1' => 'required|string|max:20',
            'inputNombre2' => 'nullable|string|max:20',
            'inputApellido1' => 'required|string|max:20',
            'inputApellido2' => 'nullable|string|max:20',
            'inputFecha' => 'required|date_format:Y-m-d',
            'inputSexo' => 'required|numeric|min:0|max:2',
            'inputEstCivil'=>'required|numeric|min:0|max:2',
            'inputCodColegio'=>'required|string',
            'inputColegio' => 'required|string'
        ]);

        if($datosValidos->fails()){
            $request->session()->flash('alert-warning', 'No se pudo insertar al aspirante');
            return response(strval($datosValidos->messages()), 500);
        }

        $aspirante = new Aspirante;
        $aspirante->nov = $request->input('inputNov');
        $aspirante->pin = $request->input('inputPIN');
        $aspirante->apellido1 = ucwords($request->input('inputApellido1'));
        $aspirante->apellido2 = ucwords($request->input('inputApellido2'));
        $aspirante->nombre1 = ucwords($request->input('inputNombre1'));
        $aspirante->nombre2 = ucwords($request->input('inputNombre2'));
        $aspirante->fecha_nacimiento = $request->input('inputFecha');
        $aspirante->sexo = $request->input('inputSexo');
        $aspirante->estado_civil = $request->input('inputEstCivil');
        $aspirante->cod_Establecimiento = $request->input('inputCodColegio');
        $aspirante->nombre_establecimiento = $request->input('inputColegio');

        $rst = $aspirante->save();
        $title='Agregar Aspirante';

        if(!$rst){
            $request->session()->flash('alert-warning', 'No se pudo insertar al aspirante');
            return redirect()->route('administrativo.agregarAspirante');
        }

        $request->session()->flash('alert-success', 'Se ha registrado el aspirante');
        return redirect()->route('administrativo.agregarAspirante');
    }
}

