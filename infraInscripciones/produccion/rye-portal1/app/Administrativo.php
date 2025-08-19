<?php

namespace App;

use App\Models\AplicacionUsuario;
use App\Models\RolPermiso;
use App\Notifications\Administrativo\AdministrativoResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Administrativo extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'login';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'login' => 'string',
    ];

    protected $fillable = [
        'dependencia',
        'login',
        'nombre',
        'nom_corto',
        'iniciales',
        'pwd',
        'puesto',
        'ua_validas',
        'nivel_valido',
        'fecha_activacion',
        'fecha_desactivacion',
        'mail',
        'cel',
        'tipo_acceso',
        'nivel_acceso',
        'permisoPrimerIngreso',
        'permisoReingreso',
        'permisoTraslados',
        'permisoIncorporados',
        'permisoExtranjeros',
        'permisoPosgrado',
        'permisoElectores',
        'verReportes',
        'anulaProceso',
        'desbloqueaCarnet',
        'equivalencias',
        'proceso',
        'becados',
        'especificas',
        'num_aux',
        'imprimirCarnet',
        'datosSensibles',
        'pwd_hash',
        'remember_token',
        'ultima_sesion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pwd','pwd_hash', 'remember_token',
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pwd_hash;
    }

    /**
     * Get the username for the user.
     *
     * @return string
     */
    public function getAuthIdentifier()
    {
        return $this->login;
    }

    /**
     * Get the attribute for password reset.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->mail;
    }

    /**
     * Chooses the notification style based on driver.
     *
     * @return string
     */
    public function routeNotificationFor($driver)
    {
        if (method_exists($this, $method = 'routeNotificationFor'.Str::studly($driver))) {
            return $this->{$method}();
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return array_map('trim', explode(',', $this->mail));
        }
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdministrativoResetPassword($token));
    }


    public function  getRol(){
        return AplicacionUsuario::where('aplicacion_codigo',15)
            ->where('usuario_dependencia',$this->dependencia)
            ->where('usuario_login',$this->login)->get()->first();
    }

    public function getPermisosUsuario()
    {
        if(isset($this->getRol()->rolAplicaciones->id)) {
            $rol = $this->getRol()->rolAplicaciones->id;
            return RolPermiso::where('rol_codigo', $rol)->get();
        }
    }

    public  function  getDependenciaNombre(){
        $dependencia = DB::table('dependencia')->select('descripcion')->where('id',$this->dependencia)->get()->first();
        return $dependencia->descripcion;
    }

    public function  getDatosSensibles(){
        if(isset($this->getRol()->rolAplicaciones->id)) {
            $rol = $this->getRol()->rolAplicaciones->id;
            $permisoDatosSensibles = RolPermiso::where('rol_codigo', $rol)
                ->where('permiso_idpermiso', 7)->get();
            if ($permisoDatosSensibles->isNotEmpty()) {
                return true;
            } else {
                return false;
            }
        }
    }




}