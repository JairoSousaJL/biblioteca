@extends('components.template')

@section('titulo', 'Cadastrar Empréstimo')
    
@section('content')
<div class="conteiner">
    <form method="POST" action="{{route('postEmprestimo')}}" autocomplete="off">
        @csrf
        <div class="card border-danger">
            <div class="card-header bg-danger">
                <p class="card-text">Novo Empréstimo</p>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-2">
                        <fieldset disabled>
                            <label class="labelCard" for="codigoEmprestimo">CÓDIGO:</label>
                            <input type="text" class="form-control form-control-sm" id="codigoEmprestimo" name="codigoEmprestimo" placeholder="000000">
                        </fieldset>
                    </div>
                    <div class="col-md-5">
                        <label class="labelCard" for="codigoLeitor">LEITOR:</label>
                        <select class="form-control form-control-sm" id="codigoLeitor" name="codigoLeitor">
                            @foreach ($leitors->all() as $leitor)
                                <option value={{$leitor->id}}> {{$leitor->nomeLeitor}} - CPF: {{$leitor->cpfLeitor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="labelCard" for="codigoLivro">LIVRO:</label>
                        <select class="form-control form-control-sm" id="codigoLivro" name="codigoLivro">
                            @foreach ($livros->all() as $livro)
                                <option value={{$livro->id}}> ISBN: {{$livro->isbnLivro}} - {{$livro->tituloLivro}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-md-6">
                        <label class="labelCard" for="dataEntrada">DATA ENTRADA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="dataEntrada" name="dataEntrada">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="labelCard" for="dataEntrega">DATA ENTREGA:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="dataEntrega" name="dataEntrega">
                        </div>
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