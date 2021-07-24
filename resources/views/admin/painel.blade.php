@extends('components.template')

@section('titulo', 'Painel de Controle')

@section('content')

    <div class="row">
        <div class="mt-3">
            <a href="{{route('cadastroLeitor')}}" >
                <div class="card border-success" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('images/leitor.png')}}" alt="Imagem de capa do card">
                    <div class="card-header bg-success">
                        <p class="card-text">Cadastrar Leitor</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-3 ml-3">
            <a href="{{route('cadastroLivro')}}" >
                <div class="card border-info" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('images/livro.png')}}" alt="Imagem de capa do card">
                    <div class="card-header bg-info">
                        <p class="card-text">Cadastrar Livro</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-3 ml-3">
            <a href="{{route('cadastroEmprestimo')}}" >
                <div class="card border-danger" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('images/emprestimo.png')}}" alt="Imagem de capa do card">
                    <div class="card-header bg-danger">
                        <p class="card-text">Cadastrar Emprestimo</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-3 ml-3">
            <a href="{{route('cadastroAdministrador')}}" >
                <div class="card border-warning" style="width: 15rem;">
                    <img class="card-img-top" src="{{asset('images/administrador.png')}}" alt="Imagem de capa do card">
                    <div class="card-header bg-warning ">
                        <p class="card-text">Cadastrar Administrador</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection