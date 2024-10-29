<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E-dados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loja.index') }}">Lojas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vendedor.index') }}">Vendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto.index') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('venda.index') }}">Vendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorio.vendas') }}">Relatórios</a>
                </li>
            </ul>
        </div>
    </nav>

        @yield('content')

</body>
</html>
