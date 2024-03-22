<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function index(){
        return view("clientes.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= new Cliente;
        $data->nombre=$request->nombre;
        $data->cedula=$request->cedula;    
        $data->telefono=$request->telefono;        
        $data->direccion=$request->direccion;
        $data->save();
        session()->flash('success', 'Cliente Agregado');
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

    public function getCliente(Request $request)
    {
        $data=Cliente::find($request->id);
        return $data;

        //
    }

    public function setCliente(Request $request)
    {
        $data=Cliente::find($request->id);
        $data->nombre=$request->nombre;
        $data->cedula=$request->cedula;
        $data->telefono=$request->telefono;
        $data->direccion=$request->direccion;
        $data->update();
        return $data;

        //
    }
}
