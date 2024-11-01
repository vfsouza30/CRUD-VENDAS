<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ClienteRepository;
use App\Repositories\LojaRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\VendedorRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ClienteRepository::class, function ($app) {
            return new ClienteRepository();
        });
        $this->app->singleton(LojaRepository::class, function ($app) {
            return new LojaRepository();
        });
        $this->app->singleton(ProdutoRepository::class, function ($app) {
            return new ProdutoRepository();
        });
        $this->app->singleton(VendedorRepository::class, function ($app) {
            return new VendedorRepository();
        });
    }

    public function boot()
    {
        //
    }
}
