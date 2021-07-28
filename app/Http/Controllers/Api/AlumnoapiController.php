<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::select([
            'alumno.id as idlum','matricula','nombre','apaterno','amaterno','curp','estadocivil.nEstadoCivil as estadocivil','direccion','colonia','municipio.nombreMunicipio as nommuni','estado.nomestado as nomestado',
            'fechaNacimiento','path'
        ])
        ->join('estadocivil','alumno.estadocivilId','=','estadocivil.id')
        ->join('municipio','alumno.municipioId','=','municipio.id')
        ->join('estado','alumno.estadoId','=','estado.id')
        ->leftjoin('alumno_discapacidad','alumno.id','=','alumno_discapacidad.alumno_id')
        ->leftjoin('discapacidad','alumno_discapacidad.discapacidad_id','=','discapacidad.id')
        ->SelectRaw('GROUP_CONCAT(discapacidad.nomdiscapacidad) as nombrediscapacidad')
        ->groupBy('alumno.id')
        ->OrderBy('alumno.id')
        ->get();
        return response()->json([
            'success' => true,
            'data' => $alumnos
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
    public function store(Request $request )
    {
        $this->validate($request,[
            'estadocivilId'=> 'integer',
            'nommunicipioIdbre'=> 'integer',
            'estadoId'=> 'integer',
            'fechaNacimiento'=>'date'
        ]);
        
        $image = $request->file('path')->store('public/image');
        $url = Storage::url($image);
        $alumno = Alumno::create([
        'matricula' => $request->matricula,
        'nombre' => $request->nombre,
        'apaterno' => $request->apaterno,
        'amaterno' => $request->amaterno,
        'curp' => $request->curp,
        'estadocivilId' =>$request->estadociv,
        'direccion' => $request->direccion,
        'colonia' => $request->colonia,
        'municipioId' =>$request->municipio,
        'estadoId' => $request->estado,
        'fechaNacimiento' => $request->fecha,
        'path' => $url
    ]);
    if($request->disca){
        $alumno->discapacidad()->attach($request->disca);
      }else{
          
      }
      return response()->json([
        'success' => true
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
        //
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
        $alumno = Alumno::find($id);
        $image = $request->file('foto')->store('public/image');
        $url = Storage::url($image);
        
       $alumno->update([
       'matricula' => $request->matricula,
        'nombre' => $request->nombre,
        'apaterno' => $request->apaterno,
        'amaterno' => $request->amaterno,
        'curp' => $request->curp,
        'estadocivilId' => $request->estadociv,
        'direccion' => $request->direccion,
        'colonia' => $request->colonia,
        'municipioId' => $request->municipio,
        'estadoId' => $request->estado,
        'fechaNacimiento' => $request->fecha,
        'path' => $url
    ]);
    if($request->disca){
        $alumno->discapacidad()->sync($request->disca);
      }else{
         
      }
      return response()->json([
        'success' => true
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json([
                'success' => false,
                'message' => 'No encontrado'
            ], 400);
        }
        if ($alumno->delete()) {
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
