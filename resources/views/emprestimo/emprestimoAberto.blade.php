@extends('components.template')

@section('titulo', 'Empréstimo Abertos')
    
@section('content')
    <div class="container">
        <div class="card border-danger">
            <div class="card-header bg-danger">
                <p class="card-text">Empréstimos Abertos</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm " id="tabelaLeitores">
                    <thead class="table-secondary">
                    <tr class="table-secondary">
                        <th style="width: 15%" scope="col">Código</th>
                        <th style="width: 30%"scope="col">Livro</th>
                        <th style="width: 30%"scope="col">Leitor</th>
                        <th style="width: 15%"scope="col">Data</th>
                        <th style="width: 10%"scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($emprestimos->all() as $emprestimo)
                            <tr class="">
                                <td> {{$emprestimo->codigoEmprestimo}}</td>
                                <td> {{$emprestimo->tituloLivro}}</td>
                                <td> {{$emprestimo->nomeLeitor}}</td>
                                <td>{{\Carbon\Carbon::parse($emprestimo->dataEntrada)->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('finalizarEmprestimo',$emprestimo->codigoEmprestimo )}}" class="btn btn-success btn-sm" title="Finalizar">
                                        <span class="fas fa-check"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection