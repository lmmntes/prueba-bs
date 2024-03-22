<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    //
    function index(){
        $cat=Categoria::all();
        return view("productos.index",compact("cat"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cat=Categoria::all();
        return view("productos.create",compact("cat"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= new Producto;
        $data->nombre=$request->nombre;
        $data->precio=$request->precio;    
        $data->categoria=$request->categoria;        
        $data->descuento=($request->descuento =="on" ? true : false);
        $data->save();
        session()->flash('success', 'Producto Agregado');   
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
