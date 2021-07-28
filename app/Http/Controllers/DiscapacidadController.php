<?php

namespace App\Http\Controllers;

use App\Models\Discapacidad;
use Illuminate\Http\Request;

class DiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $discapacidad = Discapacidad::select([
            'id','nomdiscapacidad'
        ])
        ->get();
        return view('catalago.discapacidad.index',compact('discapacidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalago.discapacidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nomdiscapacidad' => 'required'
        ]);
        Discapacidad::create($request->all());
        return redirect()->route('discapacidad.index')->with('success','Se agrego Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function show(Discapacidad $discapacidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Discapacidad $discapacidad)
    {
        //
        return view('catalago.discapacidad.edit', compact('discapacidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discapacidad $discapacidad)
    {
        //
        $request->validate([
            'nomdiscapacidad' => 'required'
        ]);
        $discapacidad->update($request->all());
        return redirect()->route('discapacidad.index')->with('success','Actualización correcta');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discapacidad $discapacidad)
    {
        //
        $discapacidad->delete();
        return redirect()->route('discapacidad.index')->with('success','Registro eliminado');
    }
}
