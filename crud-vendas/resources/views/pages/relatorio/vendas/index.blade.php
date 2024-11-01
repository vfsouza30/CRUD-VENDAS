@extends('layouts.default')
@extends('layouts.menu')
@section('title', $title)
@section('content')
    <div class="container-fluid pt-5 mt-5">
        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
        @endif
        
            @if(isset($data) && count($data) > 0)
                <h1 class="m-2">{{ $title }}</h1>
                <div class="m-2">
                    <form method="GET" action="{{ route('relatorio.vendas') }}" class="form-inline float-right mb-3">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="created_at" class="sr-only">Data</label>
                            <input type="date" class="form-control" id="created_at" name="created_at" placeholder="Data">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="nome_cliente" class="sr-only">Cliente</label>
                            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" placeholder="Nome do Cliente">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="nome_loja" class="sr-only">Loja</label>
                            <input type="text" class="form-control" id="nome_loja" name="nome_loja" placeholder="Nome da Loja">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="nome_vendedor" class="sr-only">Vendedor</label>
                            <input type="text" class="form-control" id="nome_vendedor" name="nome_vendedor" placeholder="Nome do Vendedor">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                    </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID Venda</th>
                                        <th>Loja</th>
                                        <th>Cliente</th>
                                        <th>Vendedor</th>
                                        <th>Produtos</th>
                                        <th>Quantidade de Produtos</th>
                                        <th>Valor Total</th>
                                        <th>Forma de Pagamento</th>
                                        <th>Observação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{ $row['venda_id'] }}</td>
                                            <td>{{ $row['nome_loja'] }}</td>
                                            <td>{{ $row['nome_cliente'] }}</td>
                                            <td>{{ $row['nome_vendedor'] }}</td>
                                            <td>
                                                @foreach($row['produtos'] as $produto)
                                                    <li>{{ $produto }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($row['quantidade_produtos'] as $quantidade_produto)
                                                    <li>{{ $quantidade_produto }}</li>
                                                @endforeach
                                            </td>
                                            <td>{{ $row['valor_total'] }}</td>
                                            <td>{{ $row['forma_pagamento'] }}</td>
                                            <td>{{ $row['observacao'] }}</td>
                                            
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            @else
                <p class="alert alert-warning">Nenhum dado encontrado.</p>
            @endif

        </div>
    </div>
@endsection

