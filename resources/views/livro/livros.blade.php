@extends('components.template')

@section('titulo', 'Livros')

@section('content')

    <div class="mb-3" style="text-align: right;">
        <a href="{{route('cadastroLivro')}}" class="btn btn-primary btn-sm">
            <span class="fas fa-book"></span>
            Novo Livro
        </a>
    </div>
    <div class="card border-info">
        <div class="card-header bg-info">
            <p class="card-text">Lista de Livros</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm " id="tabelaLeitores">
                <thead class="table-secondary">
                <tr class="table-secondary">
                    <th style="width: 10%" scope="col">Código</th>
                    <th style="width: 20%"scope="col">ISBN</th>
                    <th style="width: 25%"scope="col">Título</th>
                    <th style="width: 10%"scope="col">Status</th>
                    <th style="width: 10%"scope="col">Quantidade</th>
                    <th style="width: 15%"scope="col">Localização</th>
                    <th style="width: 10%"scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr class="">
                            <td scope="row"> {{$livro->codigoLivro}} </td>
                            <td> {{$livro->isbnLivro}} </td>
                            <td> {{$livro->tituloLivro}} </td>
                            @if ($livro->statusLivro == '1')
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" disabled>
                                        <span class="fas fa-check"></span>
                                    </button>
                                </td>
                            @else
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" disabled>
                                    <span class="fas fa-times"></span>
                                </button>
                            </td>
                            @endif
                            <td> {{$livro->quantidadeLivro}} </td>
                            <td> {{$livro->localizacaoLivro}} </td>
                            <td>
                                <div>
                                    <a href="{{route('livro', $livro->codigoLivro)}}" class="btn btn-secondary btn-sm" title="Ver Livro">
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