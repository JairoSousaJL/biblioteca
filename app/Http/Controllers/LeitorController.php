<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeitorRequest;
use App\Leitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeitorController extends Controller
{
    public function create(){
        return view('leitor/cadastrarLeitor');
    }

    public function index(){
        $leitores = DB::table('leitors')->paginate(10);
        return view('leitor.leitores', compact('leitores'));
    }

    public function show($codigo){
        //PESQUISA E MOSTRA Q PRIMEIRO LEITOR
        $leitor = Leitor::where('codigoLeitor', '=', $codigo)->first();
        if ($leitor) {
            //SE ENCONTRAR
            return view('leitor.mostrarLeitor', compact('leitor'));            
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('leitores'); 
        }
    }

    public function destroy($codigo){
        $leitor = Leitor::where('codigoLeitor', '=', $codigo)->first();
        $leitor->delete();
        return redirect()->route('leitores');
    }

    public function edit(StoreLeitorRequest $request, $codigo){
        $leitor = Leitor::where('codigoLeitor', $codigo);

        if ($leitor) {
            $leitor->update([
                'nomeLeitor' => $request->nomeLeitor,
                'dnLeitor' => $request->dnLeitor,
                'cpfLeitor' => $request->cpfLeitor,
                'telefoneLeitor' => $request->telefoneLeitor,
                'emailLeitor' => $request->emailLeitor,
                'enderecoLeitor' => $request->enderecoLeitor,
            ]);
            return redirect()->route('leitores'); 
        }  
    }

    public function store(StoreLeitorRequest $request){
        $min = 1000;
        $max = 100000;
        
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Leitor::where('codigoLeitor', $codigo)->first();
        }while($codigoExiste !== null);

        $leitor = Leitor::create([
            'codigoLeitor' => $codigo,
            'nomeLeitor' => $request->nomeLeitor,
            'dnLeitor' => $request->dnLeitor,
            'cpfLeitor' => $request->cpfLeitor,
            'telefoneLeitor' => $request->telefoneLeitor,
            'emailLeitor' => $request->emailLeitor,
            'enderecoLeitor' => $request->enderecoLeitor,
        ]);

        if ($leitor) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('cadastroLeitor');
        }
    }

}
