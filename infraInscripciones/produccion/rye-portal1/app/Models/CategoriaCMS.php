<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaCMS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'CategoriaCMS';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idCategoria';
    public $incrementing = true;

    /**
     * Cambio los nombre de los timestamps
     */
    const CREATED_AT = "fechaCreacion";
    const UPDATED_AT = "fechaModificacion";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idCategoria', 'nombre', 'estado'];

    public function paginas()
    {
        return $this->hasMany('App\Models\PaginaCMS');
    }
}
