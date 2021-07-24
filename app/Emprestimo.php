<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'codigoEmprestimo',
        'leitor_id',
        'livro_id',
        'dataEntrada',
        'dataEntrega',
        'statusEmprestimo',
    ];
}
