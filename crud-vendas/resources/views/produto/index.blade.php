@extends('layouts.default')

@section('title', $title)
@section('content')
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <a href="{{ route('produto.create') }}" class="btn btn-primary btn-sm float-right m-2">Adicionar</a>
    
    <h1 class="m-2">{{ $title }}</h1>
    <div class="m-2">
        @component('components.table', [
        'data' => $products,
        'routeEdit' => 'produto.edit',
        'routeDestroy' => 'produto.destroy'
        ])
        @endcomponent
    </div>
    
@endsection

