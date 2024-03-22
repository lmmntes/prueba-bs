<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;

class OrdenController extends Controller
{
    function index(){
        return view("ordenes.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("ordenes.create",compact("cat"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
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

    public function getProducto(Request $request)
    {
        $data=Producto::find($request->id);
        return $data;

        //
    }

    public function setProducto(Request $request)
    {
        $data=Producto::find($request->id);
        $data->nombre=$request->nombre;
        $data->precio=$request->precio;
        if(!empty($request->categoria)){
        $data->categoria=$request->categoria;
        }
        $data->descuento=($request->descuento =="on" ? true : false);
        $data->update();
        return $data;

        //
    }
}
