<?php

namespace App\PortalAdministrativo;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departamento';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'codigo';

    public $timestamps = false;
}
