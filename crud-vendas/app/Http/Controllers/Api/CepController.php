<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CepController extends Controller
{
    public function consultaCep(Request $request)
    {   
        
        $cep = $request->input('cep');

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        
        if ($response->successful() && !$response->json('erro')) {
            return response()->json($response->json());
        }

        return response()->json(['message' => 'CEP não encontrado ou inválido.'], 404);
    }
}
