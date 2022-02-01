<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioApiController extends Controller
{
  public function salvar(Request $request){
       if(Usuario::cadastrar($request)){
         return response("OK",201);
       }else{
         return response("FAIL",409);
       }; 
  }
}
