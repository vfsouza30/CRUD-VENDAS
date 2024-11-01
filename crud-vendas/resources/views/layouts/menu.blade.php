<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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