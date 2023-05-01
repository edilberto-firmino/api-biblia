<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(Livro::create($request->all())){

            return response()->json([
                'message'=>'Livro cadastrado com suscesso.'
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($livro)
    {
        $livro = Livro::find($livro);
        if($livro){
            return $livro;
        }
        return response()->json([
            'message'=>'Erro ao Pesquisar Livro'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $livro= Livro::find($id);
        if($livro){
            $livro->update($request->all());
            return $livro;
        }
        return response()->json([
            'message'=>'Erro ao Atualizar o Livro'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Livro::destroy($id)){
            return response()->json([
                'message'=>'Livro deletado com Sucesso'
            ]);
        }
        return response()->json([
            'message'=>'Livro Não Encontrado ou Deletado'
        ]);
    }
}
