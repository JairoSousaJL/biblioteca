<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function create(){
        return view('livro/cadastrarLivro');
    }

    public function index(){
        $livros = DB::table('livros')->paginate(10);
        return view('livro.livros', compact('livros'));
    }

    public function show($codigo){
        //PESQUISA E MOSTRA Q PRIMEIRO LIVRO
        $livro = Livro::where('codigoLivro', '=', $codigo)->first();
        if ($livro) {
            //SE ENCONTRAR
            return view('livro.mostrarLivro', compact('livro'));            
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('livros'); 
        }
    }

    public function destroy($codigo){
        $leitor = Livro::where('codigoLivro', '=', $codigo)->first();
        $leitor->delete();
        return redirect()->route('livros');
    }

    public function edit(StoreLivroRequest $request, $codigo){
        $livro = Livro::where('codigoLivro', $codigo);

        if($request->quantidadeLivro > 0){
            $status = 1;
        }else{
            $status = 0;
        }

        if ($livro) {
            $livro->update([
                'isbnLivro' => $request->isbnLivro,
                'tituloLivro' => $request->tituloLivro,
                'subtituloLivro' => $request->subtituloLivro,
                'autorLivro' => $request->autorLivro,
                'anoPublicacaoLivro' => $request->anoPublicacaoLivro,
                'editoraLivro' => $request->editoraLivro,
                'edicaoLivro' => $request->edicaoLivro,
                'cursoLivro' => $request->cursoLivro,
                'statusLivro' => $status,
                'quantidadeLivro' => $request->quantidadeLivro,
                'localizacaoLivro' => $request->localizacaoLivro,
            ]);
            return redirect()->route('livros'); 
        }  
    }

    public function store(StoreLivroRequest $request){
        $min = 1;
        $max = 900000;
        
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Livro::where('codigoLivro', $codigo)->first();
        }while($codigoExiste !== null);

        if($request->quantidadeLivro > 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $livro = Livro::create([
            'codigoLivro' => $codigo,
            'isbnLivro' => $request->isbnLivro,
            'tituloLivro' => $request->tituloLivro,
            'subtituloLivro' => $request->subtituloLivro,
            'autorLivro' => $request->autorLivro,
            'anoPublicacaoLivro' => $request->anoPublicacaoLivro,
            'editoraLivro' => $request->editoraLivro,
            'edicaoLivro' => $request->edicaoLivro,
            'cursoLivro' => $request->cursoLivro,
            'statusLivro' => $status,
            'quantidadeLivro' => $request->quantidadeLivro,
            'localizacaoLivro' => $request->localizacaoLivro,
        ]);

        if ($livro) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('cadastroLivro');
        }
    }
}
