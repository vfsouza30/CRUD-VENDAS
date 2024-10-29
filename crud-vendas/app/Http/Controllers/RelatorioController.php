<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VendaService;

class RelatorioController extends Controller
{

    protected $vendaService;

    public function __construct(VendaService $vendaService)
    {
        $this->vendaService = $vendaService;
    }
    public function salesReport(Request $request)
    {
        $sales = $this->vendaService->getSalesReport($request);

        return view('relatorio.vendas.index', [
            'title' => 'Relatório de Vendas',
            'data' => $sales
        ]);
    }
}
