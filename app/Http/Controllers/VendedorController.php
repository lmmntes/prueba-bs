<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Orden;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;



class VendedorController extends Controller
{
    function index(){
        return view("vendedores.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("vendedores.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= new Vendedor;
        $data->nombre=$request->nombre;
        $data->cedula=$request->cedula; 
        $data->save();
        session()->flash('success', 'Vendedor Agregado');  
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

    public function getVendedor(Request $request)
    {
        $data=Vendedor::find($request->id);
        return $data;

        //
    }

    public function setVendedor(Request $request)
    {
        $data=Vendedor::find($request->id);
        $data->nombre=$request->nombre;
        $data->cedula=$request->cedula;       
        $data->update();
        return $data;

        //
    }
    public function estadisticas(Request $request)
    {
                   
            $data['ventas']=Venta::where('id_vendedor',$request->id)->count();
            $data['total']=Orden::where('id_vendedor',$request->id)->sum('total');
            $data['top']=DB::select('SELECT productos.nombre ,id_producto, sum(cant) as cant
             FROM ventas,productos
             WHERE ventas.id_vendedor='.$request->id.'
             and productos.id=ventas.id
             GROUP BY id_producto
             ORDER BY sum(cant) DESC
             LIMIT 3');      
     
        return $data;

        //
    }
}
