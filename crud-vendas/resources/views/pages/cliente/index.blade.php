@extends('layouts.default')

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
            <a href="{{ route('cliente.create') }}" class="btn btn-primary btn-sm float-right m-2">Adicionar</a>
        </div>
        <div class="m-2">
            @component('components.table', [
            'data' => $clients,
            'routeEdit' => 'cliente.edit',
            'routeDestroy' => 'cliente.destroy'
            ])
            @endcomponent
        </div>
    </div>
@endsection

