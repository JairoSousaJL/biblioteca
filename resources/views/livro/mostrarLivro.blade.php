@extends('components.template')

@section('titulo', 'Livro')
    
@section('content')
    <div class="container">
        <form method="POST" action="{{route('editarLivro', $livro->codigoLivro)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="card border-info">
                <div class="card-header bg-info">
                    <p class="card-text">Dados do Livro</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-2">
                            <fieldset disabled>
                                <label class="labelCard" for="codigoLivro">CÓDIGO:</label>
                                <input type="text" class="form-control form-control-sm" id="codigoLivro" name="codigoLivro" value="{{$livro->codigoLivro}}">
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="isbnLivro">ISBN:</label>
                            <input type="text" class="form-control form-control-sm" id="isbnLivro" name="isbnLivro" value="{{$livro->isbnLivro}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="tituloLivro">TÍTULO:</label>
                            <input type="text" class="form-control form-control-sm" id="tituloLivro" name="tituloLivro" value="{{$livro->tituloLivro}}">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="subtituloLivro">SUBTÍTULO:</label>
                            <input type="text" class="form-control form-control-sm" id="subtituloLivro" name="subtituloLivro" value="{{$livro->subtituloLivro}}">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label class="labelCard" for="autorLivro">AUTOR:</label>
                            <input type="text" class="form-control form-control-sm" id="autorLivro" name="autorLivro" value="{{$livro->autorLivro}}">
                        </div>
                        <div class="col-md-2">
                            <label class="labelCard" for="anoPublicacaoLivro">ANO PUBLICAÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="anoPublicacaoLivro" name="anoPublicacaoLivro" value="{{$livro->anoPublicacaoLivro}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="editoraLivro">EDITORA:</label>
                            <input type="text" class="form-control form-control-sm" id="editoraLivro" name="editoraLivro" value="{{$livro->editoraLivro}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="edicaoLivro">EDIÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="edicaoLivro" name="edicaoLivro" value="{{$livro->edicaoLivro}}">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-3">
                            <label class="labelCard" for="cursoLivro">CURSO:</label>
                            <input type="text" class="form-control form-control-sm" id="cursoLivro" name="cursoLivro" value="{{$livro->cursoLivro}}">
                        </div>
                        <div class="col-md-3">
                            <fieldset disabled>
                                <label class="labelCard" for="statusLivro">STATUS:</label>
                                @if ($livro->statusLivro == '1')
                                    <input type="text" class="form-control form-control-sm" id="isbnLivro" name="isbnLivro" value="Disponível">
                                @else
                                    <input type="text" class="form-control form-control-sm" id="isbnLivro" name="isbnLivro" value="Indisponível">
                                @endif
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="quantidadeLivro">QUANTIDADE:</label>
                            <input type="number" class="form-control form-control-sm" id="quantidadeLivro" name="quantidadeLivro" value="{{$livro->quantidadeLivro}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="localizacaoLivro">LOCALIZAÇÃO:</label>
                            <input type="text" class="form-control form-control-sm" id="localizacaoLivro" name="localizacaoLivro" value="{{$livro->localizacaoLivro}}">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-save"></span>
                            Editar
                        </button>
                        <div class="ml-3">
                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalDeleteLivro">
                                <span class="fas fa-trash-alt"></span>
                                Excluir
                            </a>
                        </div>
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
    <!-- Modal Excluir Leitor -->
    <div class="modal fade" id="modalDeleteLivro" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLivroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteLivroLabel">Excluir Livro?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('excluirLivro', $livro->codigoLivro)}}">
                @csrf
                <div class="modal-body">
                    <h5>Título do Livro:</h5>
                    <label for="">{{$livro->tituloLivro}}</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection