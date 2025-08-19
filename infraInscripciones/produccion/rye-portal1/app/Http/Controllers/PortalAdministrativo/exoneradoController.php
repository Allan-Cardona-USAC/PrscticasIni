<?php

namespace App\Http\Controllers\PortalAdministrativo;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pcb as pcb;
use App\Models\PcbCarrera as pcbcarrera;
use App\Models\PruebaEspecifica as especifica;
use App\Models\InformacionAspirante as aspirante;
use App\Models\MotivoExoneracion as motivo;
use App\Models\UsuarioAccion;
use App\PortalAdministrativo\extension;
use App\PortalAdministrativo\facultad;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class exoneradoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.exonerado:administrativo',
            ['only' => [
                'exonerar',
                'index'
            ]]);

        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $title='Exoneracion';
        $nov = $request->get('novnum');
        $motivos = motivo::all();
        $ua = Auth::guard('administrativo')->user()->ua_validas;
        $unidades = facultad::select('nomfac','codfac')->where('activa',1)->orderBy('codfac')->get();
        if($ua != 0)
        {
            $unidades = facultad::select('nomfac','codfac')->where('activa',1)->whereIn('codfac', explode(',',$ua))->orderBy('codfac')->get();
        }

        if (!empty($nov)) {
            $aspirante = aspirante::find($request->novnum);

            if($aspirante == null)
            {
                $request->session()->flash('alert-danger', 'No hay aspirantes con este N.O.V.');
                return redirect('/administrativo/exoneracion');
            }
            return view('portalAdministrativo.aspirantes.exoneracion', compact('aspirante','motivos','unidades','title'));
        }
        return view('portalAdministrativo.aspirantes.exoneracion', compact('motivos','unidades','title'));
    }

    public function exonerar(Request $request)
    {
        $title='Listado Exonerados';
        $usuario = Auth::guard('administrativo')->user()->login;
        $ip = $request->ip();

        $this->validate($request, [
            'nov' => 'required',
            'f_aprobado' => 'required',

        ]);

        $requestData = array_merge($request->all(),
            ['descripcion' => 'EXONERADO - ' . $request['motivo']],
            ['oportunidad' => 1 ],
            ['resultado' => 1],
            ['usuario' => $usuario . '@' . \Request::ip()],
            ['fec_carga' => Carbon::now()],
            ['ciclo' => Carbon::now()->year],
            ['usuario_actualiza' => $usuario . '@' . \Request::ip()],
            ['fec_actualiza' => Carbon::now()]
        );

        if($request['ua'] > 0 && $request['ext'] >= 0 && $request['car'] >= 0) {

            $pcbs = pcbcarrera::select('id_pcb')->where('ua', $request['ua'])->where('ext', $request['ext'])->where('car', $request['car'])->get();

            foreach ($pcbs as $prueba)
            {

                $pcb = pcb::where('nov',$request['nov'])
                    ->where('id_prueba',$prueba->id_pcb)
                    ->first();

                $requestData = array_merge($requestData, ['id_prueba' => $prueba->id_pcb]);
                if($pcb == null)
                {
                    pcb::create($requestData);
                }
                else
                {
                    $pcb->update($requestData, ['id_prueba' => $prueba->id_pcb]);
                }
            }

            $requestDataPE = array_merge($request->all(),
                ['resultado' => 'Satisfactorio'],
                ['ciclo' => Carbon::now()->year],
                ['usuario' => $usuario . '@' . \Request::ip()],
                ['fechaCarga' => Carbon::now()],
                ['autorizacion' => 'EXONERADO - ' . $request['motivo']],
                ['nov' => $request['nov']],
                ['fecha_aprobado' => $request['f_aprobado']],
                ['fecha_caduca' => $request['fecha_caduca']]
            );

            $especifica = especifica::where('nov',$request['nov'])
                ->where('ua',$request['ua'])
                ->where('ext',$request['ext'])
                ->where('car',$request['car'])
                ->first();

            if($especifica == null)
            {
                especifica::create($requestDataPE);
            }
            else
            {
                $especifica->update($requestDataPE);
            }

            $auditoria = new UsuarioAccion();
            $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
            $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
            $auditoria->idCategoria = 9;
            $auditoria->usuario_ip = $request->ip();
            $auditoria->descripcion = 'exoneró al aspirante:' . $request['nov'] . 'de las PCB en la Carrera: UA:' . $request['ua'] . ' ext: ' . $request['ext'] . ' car: ' . $request['car'];
            $auditoria->fecha_accion = Carbon::now();
            $auditoria->save();

            $request->session()->flash('alert-success', 'Exoneración registrada con éxito para NOV ' . $request['nov'] );
        }


        return view('portalAdministrativo.aspirantes.listadoExonerados',compact('title'));
    }

    public function listadoExonerados(Request $request)
    {

        $title="Listado Exonerados";
        $name = $request->get('nombres');
        $surname = $request->get('apellidos');
        $nov = $request->get('nov');
        $perPage = min($request->get('page_size'),50);
        $count = 0;

        if(!empty($nov))
        {
            if($request['tipo_exo'] == 1)
            {
                $aspirante = aspirante::where('informacion_aspirante.nov', $request['nov'])
                    ->join('pcb', 'informacion_aspirante.nov', '=', 'pcb.nov')
                    ->select('informacion_aspirante.nov', 'informacion_aspirante.nombre1', 'informacion_aspirante.nombre2', 'informacion_aspirante.apellido1', 'informacion_aspirante.apellido2')
                    ->where('pcb.descripcion', 'LIKE', 'EXONERADO%')
                    ->groupBy('informacion_aspirante.nov')
                    ->paginate($perPage);

                $title = $title . " PCB";
            }
            else if($request['tipo_exo'] == 2)
            {
                $aspirante = aspirante::where('informacion_aspirante.nov', $request['nov'])
                    ->join('PruebaEspecifica', 'informacion_aspirante.nov', '=', 'PruebaEspecifica.nov')
                    ->select('informacion_aspirante.nov', 'informacion_aspirante.nombre1', 'informacion_aspirante.nombre2', 'informacion_aspirante.apellido1', 'informacion_aspirante.apellido2')
                    ->where('PruebaEspecifica.autorizacion', 'LIKE', 'EXONERADO%')
                    ->groupBy('informacion_aspirante.nov')
                    ->paginate($perPage);

                $title  = $title . " Especificas";
            }
            return view('portalAdministrativo.aspirantes.listadoExonerados', compact('aspirante', 'title', 'perPage', 'nov', 'count'));

        }

        if (!empty($name) || !empty($surname) ) {

            if($request['tipo_exo'] == 1) {

                $aspirante = aspirante::whereRaw('concat(nombre1,nombre2) like ?', str_replace(' ', '', "%{$name}%"))
                    ->when(isset($surname), function ($query) use ($surname) {
                        return $query->whereRaw('concat(apellido1,apellido2) like ?', str_replace(' ', '', "%{$surname}%"));
                    })
                    ->join('PruebaEspecifica', 'informacion_aspirante.nov', '=', 'PruebaEspecifica.nov')
                    ->select('informacion_aspirante.nov', 'informacion_aspirante.nombre1', 'informacion_aspirante.nombre2', 'informacion_aspirante.apellido1', 'informacion_aspirante.apellido2')
                    ->where('PruebaEspecifica.autorizacion', 'LIKE', 'EXONERADO%')
                    ->groupBy('informacion_aspirante.nov')
                    ->paginate($perPage);
            }
            else
            {
                $aspirante = aspirante::whereRaw('concat(nombre1,nombre2) like ?', str_replace(' ', '', "%{$name}%"))
                    ->when(isset($surname), function ($query) use ($surname) {
                        return $query->whereRaw('concat(apellido1,apellido2) like ?', str_replace(' ', '', "%{$surname}%"));
                    })
                    ->join('pcb', 'informacion_aspirante.nov', '=', 'pcb.nov')
                    ->select('informacion_aspirante.nov', 'informacion_aspirante.nombre1', 'informacion_aspirante.nombre2', 'informacion_aspirante.apellido1', 'informacion_aspirante.apellido2')
                    ->where('pcb.descripcion', 'LIKE', 'EXONERADO%')
                    ->groupBy('informacion_aspirante.nov')
                    ->paginate($perPage);
            }

            $count = $aspirante->total();
            return view('portalAdministrativo.aspirantes.listadoExonerados', compact('aspirante','title','perPage', 'name','surname','count'));
        }

        return view('portalAdministrativo.aspirantes.listadoExonerados', compact('title'));
    }

    public function exonerarEspecifica(Request $request,$nov)
    {
        $title="Listado Exonerados";
        if($request['ua'] > 0 && $request['ext'] >= 0 && $request['car'] >= 0)
        {
            $this->validate($request, [
                'fecha_aprobado' => 'required',
                'fecha_caduca' => 'required',
            ]);

            $requestData = array_merge($request->all(),
                ['resultado' => 'Satisfactorio'],
                ['ciclo' => Carbon::now()->year],
                ['usuario' => 'USUARIO ACTUALIZA'],
                ['fechaCarga' => Carbon::now()],
                ['autorizacion' => 'EXONERADO'],
                ['nov' => $nov]
            );

            $especifica = especifica::where('nov',$nov)
                ->where('ua',$request['ua'])
                ->where('ext',$request['ext'])
                ->where('car',$request['car'])
                ->first();

            if($especifica == null)
            {
                especifica::create($requestData);
            }
            else
            {
                $especifica->update($requestData);
            }

            $auditoria = new UsuarioAccion();
            $auditoria->usuario_dependencia = Auth::guard('administrativo')->user()->dependencia;
            $auditoria->usuario_login = Auth::guard('administrativo')->user()->login;
            $auditoria->idCategoria = 9;
            $auditoria->usuario_ip = $request->ip();
            $auditoria->descripcion = 'exoneró al aspirante:' . $request['nov'] . 'de las específicas en la Carrera: UA:' . $request['ua'] . ' ext: ' . $request['ext'] . ' car: ' . $request['car'];
            $auditoria->fecha_accion = Carbon::now();
            $auditoria->save();

            $request->session()->flash('alert-success', 'Exoneración de PCB registrada con éxito para NOV ' . $nov );
            return redirect('/administrativo/listadoExonerados');
        }
        else
        {
            $request->session()->flash('alert-danger', 'Debe realizar una selección válida de carrera.' );
            $aspirante = aspirante::select('nov')->where('nov',$nov)->firstOrFail();
            $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
            $extensiones = extension::all();
            return view('portalAdministrativo.aspirantes.exoneracionespe', compact('title','aspirante','unidades','extensiones'));
        }

        return view('portalAdministrativo.aspirantes.listadoExonerados')->with('title',$title);
    }

    public function indexEspecifica($nov)
    {
        $title='Exoneracion Pruebas Específicas';
        $aspirante = aspirante::select('nov')->where('nov',$nov)->firstOrFail();
        $unidades = facultad::select('codfac','nomfac')->orderBy('codfac')->get();
        $extensiones = extension::all();
        return view('portalAdministrativo.aspirantes.exoneracionespe',compact('title','aspirante','unidades','extensiones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcb  $pcb
     * @return Response
     */
    public function show(Request $nov)
    {
        $title="Aspirante a exonerar";
        $aspirante = aspirante::findOrFail($nov->nov);

        return view('portalAdministrativo.exonerado', compact('aspirante'))->with('title',$title);
    }

}
