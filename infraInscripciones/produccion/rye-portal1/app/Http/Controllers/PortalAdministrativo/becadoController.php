<?php

namespace App\Http\Controllers\PortalAdministrativo;

use App\Models\EstudiaOld as inscrito;
use App\Models\Becado as becado;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\facultad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class becadoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.becado:administrativo',
            ['only' => [
                'becar',
                'show'
            ]]);
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }


    public function estadisticas($orden)
    {
        $title ='Estadísticas Becados';
        $ordenamiento = 0;
        if($orden === 'genero') {
            $becados = becado::join('estudia_old', 'becado.carnet', '=', 'estudia_old.carnet')
                ->select('estudia_old.sexo', DB::raw("count(estudia_old.sexo) as total"))
                ->groupby('estudia_old.sexo')
                ->get();
        }else{
            $ordenamiento = 1;
            $becados = becado::join('estudia_old', 'becado.carnet', '=', 'estudia_old.carnet')
                ->join('facultad','becado.ua','=','facultad.codfac')
                ->select('becado.ua','facultad.nomcorto','estudia_old.sexo', DB::raw("count(estudia_old.sexo) as total"))
                ->groupby('becado.ua','estudia_old.sexo','facultad.nomcorto')
                ->get();
        }
        return view('portalAdministrativo.becados.estadisticas',compact('title','becados','ordenamiento'));
    }

    public function show(Request $request)
    {
        $title="Ver Becado";
        $carnet = $request->get('carnet');
        $tipo_becado = 0;
        $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $datosSensibles = Auth::guard('administrativo')->user()->getDatosSensibles();

        if(!empty($carnet))
        {
            $becado = becado::find($request['carnet']);
            $becadoaux = becado::where('carnet',$request['carnet'])->get();
            $tipo_becado = 1;

            if($becado == null)
            {
                $becado = inscrito::find($request['carnet']);
                $tipo_becado = 2;
            }

            return view('portalAdministrativo.becados.show', compact('becado','tipo_becado','unidades','becadoaux','datosSensibles','title'));
        }

        return view('portalAdministrativo.becados.show', compact('tipo_becado','unidades','title','datosSensibles'));
    }

    public function becar(Request $request)
    {
        $title="Becados";
        $carnet = $request->get('carnet');
        $ua = $request->get('ua');
        $fecha = Carbon::now();
        $usuario = "USUARIO PRUEBA";

        if($ua == -1)
        {
            $request->session()->flash('alert-danger', 'Seleccione una unidad académica.');
            return redirect('administrativo/infobecado?carnet=' . $carnet);
        }

        $becado = becado::where('ua',$request['cod_ud'])->where('carnet',$request['carnet'])->first();

        if ($becado != null)
        {
            $request->session()->flash('alert-danger', 'Estudiante ya se encuentra becado en esta Unidad Académica.');
            return redirect('administrativo/infobecado?carnet=' . $carnet);
        }

        $request->merge(['usuario' => $usuario]);
        $request->merge(['fechaRegistro' => $fecha]);


        $requestData = $request->all();
        becado::create($requestData);
        $this->sendMailBecado($request);

        $auditoria = new UsuarioAccion();
        $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
        $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
        $auditoria->idCategoria = 10;
        $auditoria->usuario_ip = $request->ip();
        $auditoria->descripcion = 'becó al estudiante:' . $request['carnet'] . ' en la UA: ' . $request['cod_ud'];
        $auditoria->fecha_accion = Carbon::now();
        $auditoria->save();

        $request->session()->flash('alert-success', 'Estudiante becado exitosamente.');
        return redirect('administrativo/infobecado?carnet=' . $carnet);
    }

    public function actualizarTramiteTitulo(Request $request)
    {
        $tramiteTitulo = $request['tramiteTitulo'];
        $carnet = $request->get('carnet');

        $request->merge(['tramiteTitulo' => $tramiteTitulo]);
        $requestData = $request->all();

        $becado = becado::where('carnet',$request['carnet'])
            ->where('ua',$request['ua'])
            ->firstOrFail();

        $becado->update($requestData);


        $request->session()->flash('alert-success', 'Trámite de título actualizado.');
        return redirect('administrativo/infobecado?carnet=' . $carnet);

    }

    public function sendMailBecado(Request $request)
    {
        Log::debug("EN CORREO");
        $estudiante = inscrito::where('carnet',$request['carnet'])->firstOrFail();

        $email = [];
        $email[0] = trim($estudiante->email);
        Log::debug($email);


        Mail::send('portalAdministrativo.mails.becaOtorgada',['estudiante' => $estudiante], function ($message) use ($request, $email) {
            $message->to($email)->subject('Becado en USAC');
        });
    }

}
