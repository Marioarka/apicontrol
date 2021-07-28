<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EstadoCivil;
use Illuminate\Http\Request;

class EstacvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadocv = EstadoCivil::all();
 
        return response()->json([
            'success' => true,
            'data' => $estadocv
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nEstadoCivil' => 'required'   
        ]);
        $estadocv = new EstadoCivil();
        $estadocv->nEstadoCivil = $request->nEstadoCivil;
        EstadoCivil::create([
            'nEstadoCivil' => $request->nEstadoCivil
        ]);
            return response()->json([
                'success' => true,
                'data' => $estadocv->toArray()
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadocv = EstadoCivil::find($id);
 
        if (!$estadocv) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $estadocv->toArray()
        ], 400);
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
        $estadocv = EstadoCivil::find($id);
        if (!$estadocv) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
        $updated = $estadocv->fill($request->all())->save();
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Actualización'
            ], 500);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estadocv = EstadoCivil::find($id);
        if (!$estadocv) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
        if ($estadocv->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Elimado Correctamente'
            ], 500);
        }
    }
}
