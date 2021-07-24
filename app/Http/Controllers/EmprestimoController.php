<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use App\Http\Requests\StoreEmprestimoRequest;
use App\Leitor;
use App\Livro;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    public function create(){
        $leitors = new Leitor();
        $leitors = $leitors->select('id', 'nomeLeitor', 'cpfLeitor')->orderBy('nomeLeitor')->get();

        $livros = new Livro();
        $livros = $livros->select('id', 'isbnLivro', 'tituloLivro')->whereIn('statusLivro', [1])->get();

        return view('emprestimo/cadastrarEmprestimo', compact('leitors', 'livros'));
    }

    public function store(StoreEmprestimoRequest $request){

        $dtEntrada = str_replace("/", "-", $request->dataEntrega);
        $dtEntregua = str_replace("/", "-", $request->dataEntrega);

        $dtEntrada = date('Y-m-d', strtotime($dtEntrada));
        $dtEntregua = date('Y-m-d', strtotime($dtEntregua));

        $min = 1;
        $max = 900000;
        
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Emprestimo::where('codigoEmprestimo', $codigo)->first();
        }while($codigoExiste !== null);

        //STATUS EMPRESTIMO = 0 (ABERTO)
        //STATUS EMPRESTIMO = 1 (FINALIZADO)

        $emprestimo = Emprestimo::create([
            'codigoEmprestimo' => $codigo,
            'leitor_id' => $request->codigoLeitor,
            'livro_id' => $request->codigoLivro,
            'dataEntrada' => $dtEntrada, 
            'dataEntrega' => $dtEntregua, 
            'statusEmprestimo' => 0,
        ]);

        $editLivro = new Livro();
        $editLivro = Livro::where('id', $request->codigoLivro)->first();

        if ($editLivro) {
            $editLivro->update([
                'quantidadeLivro' => $editLivro->quantidadeLivro - 1,
            ]);
        }

        if ($editLivro->quantidadeLivro < 1) {
            $editLivro->update([
                'statusLivro' => 0,
            ]);
        }

        if ($emprestimo) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('cadastroEmprestimo');
        }
    }

    public function emprestimosAberto(){
        /*SELECT livros.tituloLivro, leitors.nomeLeitor FROM livros JOIN emprestimos ON livros.id = emprestimos.livro_id JOIN leitors ON leitors.id = emprestimos.leitor_id; */
        
        $emprestimos = DB::table('emprestimos')
            ->join('livros', 'emprestimos.livro_id', '=', 'livros.id')
            ->join('leitors', 'emprestimos.leitor_id', '=', 'leitors.id')
            ->select('emprestimos.codigoEmprestimo', 'livros.tituloLivro', 'leitors.nomeLeitor', 'emprestimos.dataEntrada')
            ->where('emprestimos.statusEmprestimo', '=', 0 )
            ->get();
        
        return view('emprestimo.emprestimoAberto', compact('emprestimos'));
        
    }

    public function emprestimoFinalizado(){
        /*SELECT livros.tituloLivro, leitors.nomeLeitor FROM livros JOIN emprestimos ON livros.id = emprestimos.livro_id JOIN leitors ON leitors.id = emprestimos.leitor_id; */
        
        $emprestimos = DB::table('emprestimos')
        ->join('livros', 'emprestimos.livro_id', '=', 'livros.id')
        ->join('leitors', 'emprestimos.leitor_id', '=', 'leitors.id')
        ->select('emprestimos.codigoEmprestimo', 'livros.tituloLivro', 'leitors.nomeLeitor', 'emprestimos.dataEntrada')
        ->where('emprestimos.statusEmprestimo', '=', 1 )
        ->get();
    
    return view('emprestimo.emprestimoFinalizado', compact('emprestimos'));
        
    }

    public function finalizarEmprestimo($codigo){
        
        $emprestimo =  new Emprestimo();
        $emprestimo = Emprestimo::where('codigoEmprestimo', $codigo)->first();

        if ($emprestimo) {
            $emprestimo->update([
                'statusEmprestimo' => 1,
            ]);
        }

        $idLivro = $emprestimo->livro_id;

        $livro =  new Livro();
        $livro = Livro::where('id', $idLivro)->first();

        if ($livro) {
            $livro->update([
                'quantidadeLivro' => $livro->quantidadeLivro +1,
                'statusLivro' => 1,
            ]);
        }

    }

}
