<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class UsuarioController extends Controller
{
    public function logar(Request $request){
   

        return view("logar");
    }

    public function cadastrar(){
        return view("cadastrar");
    }
}
