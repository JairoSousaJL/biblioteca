@extends('components.template')

@section('titulo', 'Leitor')

@section('content')
    <div class="conteiner">
        <form method="POST" action="{{route('editarLeitor', $leitor->codigoLeitor)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="card border-success">
                <div class="card-header bg-success">
                    <p class="card-text">Dados do Leitor</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-2">
                            <fieldset disabled>
                                <label class="labelCard" for="codigoLeitor">CÓDIGO:</label>
                                <input type="text" class="form-control form-control-sm" id="codigoLeitor" name="codigoLeitor" value="{{$leitor->codigoLeitor}}">
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="nomeLeitor">NOME:</label>
                            <input type="text" class="form-control form-control-sm" id="nomeLeitor" name="nomeLeitor" value="{{$leitor->nomeLeitor}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="dnLeitor">DATA NASCIMENTO:</label>
                            <input type="text" class="form-control form-control-sm" id="dnLeitor" name="dnLeitor" value="{{$leitor->dnLeitor}}">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="cpfLeitor">CPF:</label>
                            <input type="text" class="form-control form-control-sm" id="cpfLeitor" name="cpfLeitor" value="{{$leitor->cpfLeitor}}">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label class="labelCard" for="telefoneLeitor">CELULAR:</label>
                            <input type="text" class="form-control form-control-sm" id="telefoneLeitor" name="telefoneLeitor" value="{{$leitor->telefoneLeitor}}">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="emailLeitor">E-MAIL:</label>
                            <input type="text" class="form-control form-control-sm" id="emailLeitor" name="emailLeitor" value="{{$leitor->emailLeitor}}">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="enderecoLeitor">ENDEREÇO:</label>
                            <input type="text" class="form-control form-control-sm" id="enderecoLeitor" name="enderecoLeitor" value="{{$leitor->enderecoLeitor}}">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-save"></span>
                            Editar
                        </button>
                        <div class="ml-3">
                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalDeleteLeitor">
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
    <div class="modal fade" id="modalDeleteLeitor" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLeitorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteLeitorLabel">Excluir Leitor?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('excluirLeitor', $leitor->codigoLeitor)}}">
                @csrf
                <div class="modal-body">
                    <h5>Nome do Leitor:</h5>
                    <label for="">{{$leitor->nomeLeitor}}</label>
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