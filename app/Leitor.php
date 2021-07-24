<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    protected $fillable = [
        'codigoLeitor',
        'nomeLeitor',
        'dnLeitor',
        'cpfLeitor',
        'telefoneLeitor',
        'emailLeitor',
        'enderecoLeitor',
    ];
    public function emprestimo(){
        return $this->hasOne(Emprestimo::class, 'leitor_id');
    }
}
