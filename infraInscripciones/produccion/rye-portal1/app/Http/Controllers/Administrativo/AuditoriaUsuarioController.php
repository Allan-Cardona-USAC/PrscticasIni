<?php


namespace App\Http\Controllers\Administrativo;


use App\Administrativo;
use App\Http\Controllers\Controller;
use App\Models\CategoriaAccion;
use App\Models\UsuarioAccion;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuditoriaUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrativo.auth:administrativo');
        $this->middleware('administrativo.administrarUsuario:administrativo');
        $this->middleware('administrativo.cuentaDesactivada:administrativo');
    }

    /**
     * Muestra todas las acciones de los usuarios.
     *(muestra el perfil)
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $title = 'Auditoria';

        $categorias = CategoriaAccion::all();
        $idCategoria = $request->input('categoria');
        $perPage = min($request->get('page_size'),50);
        $id = $request->input('id');
        $name = $request->get('name');
        $fecha = $request->input('fecha');

        /* Se hace filtro por tipo de acción (idCategoria),
        id de usuario(usuario_login),
        nombre de usuario (tabla usuario_accion no contiene nombre por lo que se hace JOIN con tabla de usuario "Administrativo" )
        y/o fecha de la acción (fecha_accion). */
        $acciones = UsuarioAccion::when($idCategoria > -1, function ($query) use ($idCategoria) {
                return $query->where('idCategoria', $idCategoria);
            })
            ->when(!empty($id), function ($query) use ($id) {
                return $query->where('usuario_login',$id);
            })
            ->when(!empty($name), function ($query) use ($name) {
                return $query->whereIn('usuario_login', function ($query) use ($name)
                {
                    return $query->select('login')->from(with(new Administrativo())->getTable())->whereRaw('nombre like ?', "%{$name}%");
                });
            })
            ->when(!empty($fecha), function ($query) use ($fecha) {
                return $query->whereDate('fecha_accion', $fecha);
            })
            ->paginate($perPage);

        return view('administrativo.auditoria.index',compact('title','categorias','idCategoria','perPage','id','name','fecha','acciones'));
    }

}
