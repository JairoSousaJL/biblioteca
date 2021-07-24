@extends('components.template')

@section('titulo', 'Empréstimo Finalizados')
    
@section('content')
    <div class="container">
        <div class="card border-danger">
            <div class="card-header bg-danger">
                <p class="card-text">Empréstimos Finalizados</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm " id="tabelaLeitores">
                    <thead class="table-secondary">
                    <tr class="table-secondary">
                        <th style="width: 15%" scope="col">Código</th>
                        <th style="width: 30%"scope="col">Livro</th>
                        <th style="width: 30%"scope="col">Leitor</th>
                        <th style="width: 15%"scope="col">Data</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($emprestimos->all() as $emprestimo)
                            <tr class="">
                                <td> {{$emprestimo->codigoEmprestimo}}</td>
                                <td> {{$emprestimo->tituloLivro}}</td>
                                <td> {{$emprestimo->nomeLeitor}}</td>
                                <td>{{\Carbon\Carbon::parse($emprestimo->dataEntrada)->format('d-m-Y')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection