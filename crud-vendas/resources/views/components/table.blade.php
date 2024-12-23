@extends('layouts.menu')
@if(isset($data) && count($data) > 0)
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    @foreach(array_keys($data[0]) as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        @foreach($row as $key => $value)
                            @if($key == 'created_at' || $key == 'updated_at')
                                <td>{{ date('d/m/Y H:i:s', strtotime($value)) }}</td>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach
                        <td>
                            <a href="{{ route($routeEdit, $row['id']) }}" class="btn btn-primary btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $row['id'] }}">Excluir</button>
                        </td>
                    </tr>
                    @include('components.modal-delete', ['route' => $routeDestroy ])
                    
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="alert alert-warning">Nenhum dado encontrado.</p>
@endif
