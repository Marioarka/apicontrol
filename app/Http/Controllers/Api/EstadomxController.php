<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadomxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadomx = Estado::all();
 
        return response()->json([
            'success' => true,
            'data' => $estadomx
        ]);
    
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
        $this->validate($request, [
            'nomestado' => 'required'   
        ]);
        $estadomx = new Estado();
        $estadomx->nomestado = $request->nomestado;
        Estado::create([
            'nomestado' => $request->nomestado
        ]);
            return response()->json([
                'success' => true,
                'data' => $estadomx->toArray()
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
        $estadomx = Estado::find($id);
 
        if (!$estadomx) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $estadomx->toArray()
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estadomx = Estado::find($id);
        if (!$estadomx) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
        if ($estadomx->delete()) {
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