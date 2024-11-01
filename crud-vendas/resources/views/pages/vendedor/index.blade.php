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
            <a href="{{ route('vendedor.create') }}" class="btn btn-primary btn-sm float-right m-2">Adicionar</a>
        </div>
        <div class="m-2">
            @if(isset($sellers) && count($sellers) > 0)

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Vendedor ID</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Loja</th>
                                        <th>Data Criação</th>
                                        <th>Data Atualização</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sellers as $row)    
                                        <tr>
                                            <td>{{ $row['id'] }}</td>
                                            <td>{{ $row['nome'] }}</td>
                                            <td>{{ $row['cpf'] }}</td>
                                            <td>{{ $row['loja_nome'] }}</td>
                                            <td>{{ $row['created_at'] }}</td>
                                            <td>{{ $row['updated_at'] }}</td>
                                            <td>
                                                <a href="{{ route('vendedor.edit', $row['id']) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $row['id'] }}">Excluir</button>
                                            </td>
                                        </tr>
                                        @include('components.modal-delete', ['routeDestroy' => 'vendedor.destroy' ])
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

