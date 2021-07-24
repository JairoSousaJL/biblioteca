@extends('components.template')

@section('titulo', 'Cadastrar Administrador')

@section('content')
    <div class="conteiner">
        @if ($errors->any())
            <div class="alert alert-danger mx-auto mb-3" style="max-width: 30rem;">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{route('postAdministrador')}}" autocomplete="off">
            @csrf
            <div class="card border-warning">
                <div class="card-header bg-warning">
                    <p class="card-text">Cadastrar Administrador</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-2">
                            <fieldset disabled>
                                <label class="labelCard" for="codigoAdministrador">CÓDIGO:</label>
                                <input type="text" class="form-control form-control-sm" id="codigoAdministrador" name="codigoAdministrador" placeholder="000000">
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label class="labelCard" for="nomeLeitor">NOME:</label>
                            <input type="text" class="form-control form-control-sm" id="nomeAdministrador" name="nomeAdministrador" placeholder="Nome">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard" for="dnLeitor">CPF:</label>
                            <input type="text" class="form-control form-control-sm" id="cpfAdministrador" name="cpfAdministrador" placeholder="000.000.000-00">
                        </div>
                        <div class="col-md-3">
                            <label class="labelCard">TIPO:</label>
                            <select class="form-control form-control-sm" id="tipoAdministrador" name="tipoAdministrador">
                                <option value="0" selected>Bibliotecário</option>
                                <option value="1">Administrador</option>
                            </select>
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