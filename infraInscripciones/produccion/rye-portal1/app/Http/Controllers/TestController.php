<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;

class TestController extends Controller {
    
    public function index(){
        $title = "Prueba Controlador";

        $temp = true;
        $test = $this->change($temp);
        $nov = '2010000001';
        $existAspitante = Aspirante::where(['nov'=>$nov]);
        

        return view('test', compact('title', 'test'));
    }

    private function change($param){
        $temp = $param;
        return $temp;
    }
}