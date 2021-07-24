<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'codigoLivro',
        'isbnLivro',
        'tituloLivro',
        'subtituloLivro',
        'autorLivro',
        'anoPublicacaoLivro',
        'editoraLivro',
        'edicaoLivro',
        'cursoLivro',
        'statusLivro',
        'quantidadeLivro',
        'localizacaoLivro'
    ];

    public function emprestimo(){
        return $this->hasOne(Emprestimo::class, 'livro_id');
    }
}
