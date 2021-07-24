@extends('components.template')

@section('titulo', 'Leitores')

@section('content')

    <div class="mb-3" style="text-align: right;">
        <a href="{{route('cadastroLeitor')}}" class="btn btn-primary btn-sm">
            <span class="fas fa-user"></span>
            Novo Leitor
        </a>
    </div>
    <div class="card border-success">
        <div class="card-header bg-success">
            <p class="card-text">Lista de Leitores</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm " id="tabelaLeitores">
                <thead class="table-secondary">
                <tr class="table-secondary">
                    <th style="width: 15%" scope="col">Código</th>
                    <th style="width: 30%"scope="col">Nome</th>
                    <th style="width: 20%"scope="col">Telefone</th>
                    <th style="width: 20%"scope="col">CPF</th>
                    <th style="width: 15%"scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($leitores as $leitor)
                        <tr class="">
                            <td scope="row"> {{$leitor->codigoLeitor}} </td>
                            <td scope="row"> {{$leitor->nomeLeitor}} </td>
                            <td scope="row"> {{$leitor->cpfLeitor}} </td>
                            <td scope="row"> {{$leitor->telefoneLeitor}} </td>
                            <td>
                                <div>
                                    <a href="{{route('leitor', $leitor->codigoLeitor)}}" class="btn btn-secondary btn-sm" title="Ver Leitor">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection