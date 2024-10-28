<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Loja;

class LojaController extends Controller
{
   
    public function index()
    {
        $stores = Loja::all()->makeHidden(['deleted_at']);
        
        return view('loja.index',['title' => 'Lojas', 'stores' => $stores->toArray()]);
    }

    public function create()
    {
        return view('loja.create', ['title' => 'Nova Loja']);
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required',
            'cnpj' => 'required|digits:14',
            'cep' => 'required|digits:8',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|size:2|not_in:D',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cnpj' =>'O campo CNPJ dever ser preenchido com 14 caracteres numerais',
            'cep' => 'O campo CEP precisa ser preenchido com 8 caracteres numerais',
            'endereco' => 'O campo endereço precisa ser preenchido',
            'bairro' => 'O campo bairro precisa ser preenchido',
            'cidade' => 'O campo cidade precisa ser preenchido',
            'uf' => 'UF invalida',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        Loja::create($validatedData);

        return redirect()->route('loja.index')->with('success', 'Loja criada com sucesso!');
    }

    public function edit(string $id)
    {
        $store = Loja::find($id);
        return view('loja.edit', ['title' => 'Editar Loja', 'store' => $store]);
    }

    public function update(Request $request, Loja $loja)
    {
        $rules = [
            'nome' => 'required',
            'cnpj' => 'required|digits:14',
            'cep' => 'required|digits:8',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|size:2|not_in:D',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cnpj' =>'O campo CNPJ dever ser preenchido com 14 caracteres numerais',
            'cep' => 'O campo CEP precisa ser preenchido com 8 caracteres numerais',
            'endereco' => 'O campo endereço precisa ser preenchido',
            'bairro' => 'O campo bairro precisa ser preenchido',
            'cidade' => 'O campo cidade precisa ser preenchido',
            'uf' => 'UF invalida',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        $loja->update($validatedData);

        return redirect()->route('loja.index')->with('success', 'Loja atualizada com sucesso!');
    }

    public function destroy(Loja $loja)
    {
        $loja->delete();

        return redirect()->route('loja.index')->with('success', 'Loja deletada com sucesso!');
    }

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
