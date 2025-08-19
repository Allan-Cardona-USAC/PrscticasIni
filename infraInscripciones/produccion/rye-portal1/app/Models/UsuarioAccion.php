<?php

namespace App\Models;;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class UsuarioAccion extends Model
{
    use HasCompositePrimaryKey;

    protected $table = 'usuario_accion';
    protected $primaryKey = ['idAccion', 'usuario_dependencia' , 'usuario_login', 'idCategoria'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idAccion',
        'usuario_dependencia' ,
        'usuario_login',
        'idCategoria',
        'usuario_ip',
        'descripcion',
        'fecha_accion'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Administrativo', 'usuario_dependencia','dependencia')
            ->where('login',$this->usuario_login);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\CategoriaAccion', 'idCategoria','idCategoria');
    }
}
