<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Hash;
use DB;

class Usuario extends Model
{
    protected $connection = "mysql";
    protected $table = 'usuario';

    public static function listar(int $limite){
        $sql = self::select([
            "id",
            "nome",
            "senha",
            "data_cadastro"
        ])
        ->limit($limite)
        ->get();
        return $sql;
    }

    public static function cadastrar(Request $request){
        return self::insert([
            "nome"=>$request->input('nome'),
            "email"=>$request->input('email'),
            "senha"=>Hash::make($request->input('senha')),
            "data_cadastro"=> DB::raw('NOW()')
        ]);
    }
}
