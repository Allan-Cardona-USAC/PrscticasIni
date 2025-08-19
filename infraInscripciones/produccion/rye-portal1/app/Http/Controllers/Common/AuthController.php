<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $rol='aspirante';
        $title='Inicia sesión';
        return view('common.auth.login', compact('rol', 'title'));
    }
}
