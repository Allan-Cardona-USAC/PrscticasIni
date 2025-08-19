<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUA extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_UA';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'tipo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'descripcion',
        'prioridad'
    ];

    public function facultades()
    {
        return $this->hasMany('App\Models\Facultad','tipo_ua','tipo');
    }

    public $timestamps = false;
}
