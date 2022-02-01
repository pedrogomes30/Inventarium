<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $request){
        $request->validate([
            "nome"=>"required",
            "email"=>"required|email",
            "senha"=>"required|min:5"
        ]);

        if(Usuario::cadastrar($request)){
            return view('usuario.sucesso',[
                "fulano"=>$request->input('nome')
            ]);
        }else{
            echo'salvar no banco falhou !';
        };     
    }
}
