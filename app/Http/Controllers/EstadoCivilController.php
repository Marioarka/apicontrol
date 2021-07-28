<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estadoCivil = EstadoCivil::select(['id','nEstadoCivil'])
        ->get();
        return view('catalago.estadocivil.index',compact('estadoCivil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalago.estadocivil.create');
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
            'nEstadoCivil' => 'required'
        ]);
        EstadoCivil::create($request->all());
        return redirect()->route('estadocivil.index')->with('success','Se agrego Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoCivil $estadoCivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoCivil $estadocivil)
    {
        //
        return view('catalago.estadocivil.edit',compact('estadocivil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoCivil $estadocivil)
    {
        //
        $request->validate([
            'nEstadoCivil' => 'required'
        ]);
        $estadocivil->update($request->all());
        return redirect()->route('estadocivil.index')->with('success','Actualización correcta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoCivil $estadocivil)
    {
        //
        $estadocivil->delete();
        return redirect()->route('estadocivil.index')->with('success','Registro eliminado');
    }
}
