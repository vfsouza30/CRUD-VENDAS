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
            <h1 class="m-0">{{ $title }}</h1>
            <a href="{{ route('loja.create') }}" class="btn btn-primary btn-sm">Adicionar</a>
        </div>
        <div class="m-2">
            @component('components.table', [
            'data' => $stores,
            'routeEdit' => 'loja.edit',
            'routeDestroy' => 'loja.destroy'
            ])
            @endcomponent
        </div>
    </div>
    
@endsection

