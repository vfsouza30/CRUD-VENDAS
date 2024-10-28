<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    public function vendedoresLoja(Request $request)
    {
        $storeId = $request->input('store');
        $sellers = Vendedor::select('id', 'nome')->where('loja_id', $storeId)->get();

        return response()->json($sellers);
    }
}
