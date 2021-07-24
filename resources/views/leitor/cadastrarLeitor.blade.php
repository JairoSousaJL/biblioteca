@extends('components.template')

@section('titulo', 'Cadastrar Leitor')

@section('content')
    <div class="conteiner">
        <form method="POST" action="{{route('postLeitor')}}" autocomplete="off">
            @csrf
            <div class="card border-success">
                <div class="card-header bg-success">
                    <p class="card-text">Cadastrar Leitor</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-2">
                            <fieldset disabled>
                                <label class="labelCard" for="codigoLeitor">CÓDIGO:</label>
                                <input type="text" class="form-control form-control-sm" id="codigoLeitor" name="codigoLeitor" placeholder="000000">
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="nomeLeitor">NOME:</label>
                            <input type="text" class="form-control form-control-sm" id="nomeLeitor" name="nomeLeitor" placeholder="Nome">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="dnLeitor">DATA NASCIMENTO:</label>
                            <input type="text" class="form-control form-control-sm" id="dnLeitor" name="dnLeitor" placeholder="00/00/0000">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="cpfLeitor">CPF:</label>
                            <input type="text" class="form-control form-control-sm" id="cpfLeitor" name="cpfLeitor" placeholder="000.000.000-00">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label class="labelCard" for="telefoneLeitor">CELULAR:</label>
                            <input type="text" class="form-control form-control-sm" id="telefoneLeitor" name="telefoneLeitor" placeholder="(00) 00000-0000">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="emailLeitor">E-MAIL:</label>
                            <input type="text" class="form-control form-control-sm" id="emailLeitor" name="emailLeitor" placeholder="leitor@biblioteca.com">
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="enderecoLeitor">ENDEREÇO:</label>
                            <input type="text" class="form-control form-control-sm" id="enderecoLeitor" name="enderecoLeitor" placeholder="Localidade">
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