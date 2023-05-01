<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testamento;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Testamento::create($request->all())){

            return response()->json([
                'message'=>'Testamento cadastrado com suscesso.'
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($testamento)
    {

        // return Testamento::findOrFail($id);

        $testamento = Testamento::find($testamento);
        if($testamento){
            return $testamento;
        }
        return response()->json([
            'message'=>'Erro ao Pesquisar Testamento'
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testamento = Testamento::findOrFail($id);
        if($testamento){
            $testamento->update($request->all());
            return $testamento;
        }
        return response()->json([
            'message'=>'Erro ao Atualizar o Testamento'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Testamento::destroy($id)){
            return response()->json([
                'message'=>'Testamento deletado com Sucesso'
            ]);
        }
        return response()->json([
            'message'=>'Testamento Não Encontrado ou Deletado'
        ]);

        }

}


