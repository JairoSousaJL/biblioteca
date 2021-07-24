@extends('components.template')

@section('titulo', 'Cadastrar Livro')
    
@section('content')
    <div class="container">
        <form method="POST" action="{{route('postLivro')}}" autocomplete="off">
            @csrf
            <div class="card border-info">
                <div class="card-header bg-info">
                    <p class="card-text">Cadastrar Livro</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-2">
                            <fieldset disabled>
                                <label class="labelCard" for="codigoLivro">CÓDIGO:</label>
                                <input type="text" class="form-control form-control-sm" id="codigoLivro" name="codigoLivro" placeholder="000000">
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="isbnLivro">ISBN:</label>
                            <input type="text" class="form-control form-control-sm" id="isbnLivro" name="isbnLivro" placeholder="000-00-0000-00-0">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="tituloLivro">TÍTULO:</label>
                            <input type="text" class="form-control form-control-sm" id="tituloLivro" name="tituloLivro" placeholder="Título">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="subtituloLivro">SUBTÍTULO:</label>
                            <input type="text" class="form-control form-control-sm" id="subtituloLivro" name="subtituloLivro" placeholder="Subtítulo">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label class="labelCard" for="autorLivro">AUTOR:</label>
                            <input type="text" class="form-control form-control-sm" id="autorLivro" name="autorLivro" placeholder="Nome do Autor">
                        </div>
                        <div class="col-md-2">
                            <label class="labelCard" for="anoPublicacaoLivro">ANO PUBLICAÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="anoPublicacaoLivro" name="anoPublicacaoLivro" placeholder="Ano Publicação">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="editoraLivro">EDITORA:</label>
                            <input type="text" class="form-control form-control-sm" id="editoraLivro" name="editoraLivro" placeholder="Editora">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="edicaoLivro">EDIÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="edicaoLivro" name="edicaoLivro" placeholder="Edição">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-3">
                            <label class="labelCard" for="cursoLivro">CURSO:</label>
                            <input type="text" class="form-control form-control-sm" id="cursoLivro" name="cursoLivro" placeholder="Curso">
                        </div>
                        <div class="col-md-3">
                            <fieldset disabled>
                                <label class="labelCard" for="statusLivro">STATUS:</label>
                            <input type="text" class="form-control form-control-sm" id="statusLivro" name="statusLivro" placeholder="Status">
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="quantidadeLivro">QUANTIDADE:</label>
                            <input type="number" class="form-control form-control-sm" id="quantidadeLivro" name="quantidadeLivro">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="localizacaoLivro">LOCALIZAÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="localizacaoLivro" name="localizacaoLivro" placeholder="Local do Livro">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-save"></span>
                            Cadastrar
                        </button>
                        <div class="ml-3">
                            <a href="{{route('painel')}}" class="btn btn-sm btn-danger"><span class="fas fa-arrow-circle-left"></span>
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection