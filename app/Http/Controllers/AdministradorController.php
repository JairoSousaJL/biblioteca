<?php

namespace App\Http\Controllers;

use App\Administrador;
use App\Http\Requests\StoreAdministradorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function painel(){
        return view('admin.painel');
    }

    public function create(){
        return view('admin/cadastrarAdministrador');
    }

    public function store(StoreAdministradorRequest $request){
        $min = 1000;
        $max = 100000;
        
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Administrador::where('codigoAdministrador', $codigo)->first();
        }while($codigoExiste !== null);

        //ADMINISTRADOR = 0 => Bibliotecário
        //ADMINISTRADOR = 1 => Administrador
        $leitor = Administrador::create([
            'codigoAdministrador' => $codigo,
            'nomeAdministrador' => $request->nomeAdministrador,
            'cpfAdministrador' => $request->cpfAdministrador,
            'user' => $request->cpfAdministrador,
            'password' => Hash::make('12345678'),
            'statusAdministrador' => true,
            'tipoAdministrador' => $request->tipoAdministrador,
        ]);

        if ($leitor) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('cadastrarAdministrador');
        }
    }
}
