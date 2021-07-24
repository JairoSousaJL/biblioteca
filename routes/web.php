<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin'], function(){
    //auth verifica se o usuario está logado quando acessa a rota
    //se não estiver logado redireciona o usuario para a tela declarada na rota do arquivo Middleware/Authenticate.php
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/painel', [\App\Http\Controllers\AdministradorController::class, 'painel'])->name('painel');
        Route::get('/admin/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logoutAdmin');
        //LEITOR
        Route::get('/cadastro/leitor', [\App\Http\Controllers\LeitorController::class, 'create'])->name('cadastroLeitor');
        Route::post('/cadastro/leitor', [\App\Http\Controllers\LeitorController::class, 'store'] )->name('postLeitor');
        Route::get('/leitores', [\App\Http\Controllers\LeitorController::class, 'index'] )->name('leitores');
        Route::get('/leitor/{codigo}', [\App\Http\Controllers\LeitorController::class, 'show'] )->name('leitor');
        Route::post('/excluir/leitor/{codigo}', [\App\Http\Controllers\LeitorController::class, 'destroy'] )->name('excluirLeitor');
        Route::put('/editar/leitor/{codigo}', [\App\Http\Controllers\LeitorController::class, 'edit'] )->name('editarLeitor');
        //LIVRO
        Route::get('/cadastro/livro', [\App\Http\Controllers\LivroController::class, 'create'])->name('cadastroLivro');
        Route::post('/cadastro/livro', [\App\Http\Controllers\LivroController::class, 'store'])->name('postLivro');
        Route::get('/livros', [\App\Http\Controllers\LivroController::class, 'index'])->name('livros');
        Route::get('/livro/{codigo}', [\App\Http\Controllers\LivroController::class, 'show'])->name('livro');
        Route::post('/excluir/livro/{codigo}', [\App\Http\Controllers\LivroController::class, 'destroy'] )->name('excluirLivro');
        Route::put('/editar/livro/{codigo}', [\App\Http\Controllers\LivroController::class, 'edit'] )->name('editarLivro');
        //ADMINISTRADOR
        Route::get('/cadastro/administrador', [\App\Http\Controllers\AdministradorController::class, 'create'])->name('cadastroAdministrador');
        Route::post('/cadastro/administrador', [\App\Http\Controllers\AdministradorController::class, 'store'])->name('postAdministrador');
        //EMPRESTIMO
        Route::get('/cadastro/emprestimo', [\App\Http\Controllers\EmprestimoController::class, 'create'])->name('cadastroEmprestimo');
        Route::post('/cadastro/emprestimo', [\App\Http\Controllers\EmprestimoController::class, 'store'])->name('postEmprestimo');
        Route::get('/emprestimos/abertos', [\App\Http\Controllers\EmprestimoController::class, 'emprestimosAberto'])->name('emprestimosAbertos');
        Route::get('/emprestimos/finalizados', [\App\Http\Controllers\EmprestimoController::class, 'emprestimoFinalizado'])->name('emprestimoFinalizado');
        Route::get('/emprestimos/{codigo}', [\App\Http\Controllers\EmprestimoController::class, 'finalizarEmprestimo'])->name('finalizarEmprestimo');

    });
    Route::post('/authAdmin', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('postLogin');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('loginAdmin');
