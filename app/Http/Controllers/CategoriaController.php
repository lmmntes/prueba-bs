<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    function index(){
        return view("categorias.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= new Categoria;
        $data->nombre=$request->nombre;      
        $data->save();
        session()->flash('success', 'Categoria Agregada');
        return 1;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCategoria(Request $request)
    {
        $data=Categoria::find($request->id);
        return $data;

        //
    }

    public function setCategoria(Request $request)
    {
        $data=Categoria::find($request->id);
        $data->nombre=$request->nombre;        
        $data->update();
        return $data;

        //
    }
}
