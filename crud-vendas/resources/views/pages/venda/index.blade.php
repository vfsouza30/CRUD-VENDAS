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

        <div class="d-flex justify-content-between align-items-center m-2">
            <h1 class="m-2">{{ $title }}</h1>
            <a href="{{ route('venda.create') }}" class="btn btn-primary btn-sm float-right m-2">Adicionar</a>
        </div>
        <div class="m-2">
            @if(isset($sales) && count($sales) > 0)

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Venda ID</th>
                                        <th>Cliente</th>
                                        <th>Loja</th>
                                        <th>Vendedor</th>
                                        <th>Valor Total</th>
                                        <th>Forma Pagamento</th>
                                        <th>Observação</th>
                                        <th>Data Criação</th>
                                        <th>Data Atualização</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $row)    
                                        <tr>
                                            <td>{{ $row['id'] }}</td>
                                            <td>{{ $row['cliente_nome'] }}</td>
                                            <td>{{ $row['loja_nome'] }}</td>
                                            <td>{{ $row['vendedor_nome'] }}</td>
                                            <td>{{ $row['valor_total'] }}</td>
                                            <td>{{ $row['forma_pagamento'] }}</td>
                                            <td>{{ $row['observacao'] }}</td>
                                            <td>{{ $row['created_at'] }}</td>
                                            <td>{{ $row['updated_at'] }}</td>
                                            <td>
                                                <a href="{{ route('venda.edit', $row['id']) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $row['id'] }}">Excluir</button>
                                            </td>
                                        </tr>
                                        @include('components.modal-delete', ['routeDestroy' => 'venda.destroy' ])
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

