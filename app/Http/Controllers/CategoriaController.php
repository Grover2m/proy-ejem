<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categorias = Categoria::paginate(10);
       return view("admin.categoria.index", compact("categorias"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos
        $request->validate([
            "nombre" => "required"
        ]);

        //guardamos
        $cat = new Categoria;
        $cat -> nombre = $request->nombre;
        $cat -> detalle = $request->detalle;
        $cat -> save();
        //respuesta

        return redirect("/admin/categoria");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Categoria = Categoria::find($id);
        $productos = $Categoria->productos;
        $categorias = Categoria::get();

        return view("admin.producto.index",compact("productos","categorias"));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validamos
         $request->validate ([
            "nombre" => "required"
        ]);

        //guardamos
        $cat = Categoria :: find($id );
        $cat -> nombre = $request->nombre;
        $cat -> detalle = $request->detalle;
        $cat -> save();
        //respuesta

        return redirect("/admin/categoria");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
