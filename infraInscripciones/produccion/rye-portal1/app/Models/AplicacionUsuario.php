<?php

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class AplicacionUsuario extends Model
{
    use HasCompositePrimaryKey;

    protected $table = 'aplicacion_usuario';
    protected $primaryKey = ['aplicacion_codigo', 'usuario_dependencia' , 'usuario_login', 'idrolAplicacion'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'aplicacion_codigo',
        'usuario_dependencia' ,
        'usuario_login',
        'idrolAplicacion'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Administrativo', 'usuario_dependencia','dependencia')
            ->where('login',$this->usuario_login);
    }

    public function rolAplicaciones()
    {
        return $this->belongsTo('App\Models\RolAplicaciones', 'idrolAplicacion','id');
    }

    public function aplicacion()
    {
        return $this->belongsTo('App\Models\Aplicacion', 'aplicacion_codigo','codigo');
    }
}
