@extends('layouts.default')

@section('title', $title)
<button class="btn btn-primary float-right m-2" data-toggle="modal" data-target="#createClientModal">Adicionar</button>
@section('content')
    <h1 class="m-2">{{ $title }}</h1>
    <div class="m-2">
        @component('components.table', [
        'data' => $clients
        ])
        @endcomponent
    </div>
    
@endsection
@include('components.cliente.modal-clientes-novo')

