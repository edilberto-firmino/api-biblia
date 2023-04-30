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
        return Testamento::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return Testamento::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testamento = Testamento::findOrFail($id);
        $testamento->update($request->all());
        return $testamento;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Testamento::destroy($id);



    }
}


