<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function  index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Versiculo::create($request->all())){

            return response()->json([
                'message'=>'Versiculo cadastrado com suscesso.'
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($versiculo)
    {

        $versiculo = Versiculo::find($versiculo);
        if($versiculo){
            return $versiculo;
        }
        return response()->json([
            'message'=>'Erro ao Pesquisar Versiculo'
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $versiculo= Versiculo::find($id);
        if($versiculo){
            $versiculo->update($request->all());
            return $versiculo;
        }
        return response()->json([
            'message'=>'Erro ao Atualizar o Versiculo'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Versiculo::destroy($id)){
            return response()->json([
                'message'=>'Versiculo deletado com Sucesso'
            ]);
        }
        return response()->json([
            'message'=>'Versiculo Não Encontrado ou Deletado'
        ]);
    }
}
