<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Discapacidad;
use App\Models\Estado;
use App\Models\EstadoCivil;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('catalago.alumno.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Combos y check para vista de crear
        $combomuni = Municipio::select('id','nombreMunicipio')
        ->get();
        $comboestado = Estado::select('id','nomestado')
        ->get();
        $comboestacivil = EstadoCivil::select('id','nEstadoCivil')
        ->get();
        $checkdisca = Discapacidad::select('id','nomdiscapacidad')
        
        ->get();
        return view('catalago.alumno.create',compact('combomuni','comboestado','comboestacivil','checkdisca'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $image = $request->file('foto')->store('public/image');
            $url = Storage::url($image);
            $alumno = Alumno::create([
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
            $alumno->discapacidad()->attach($request->disca);
          }else{
              
          }
        return redirect()->route('alumno.index')->with('success','Se agrego Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('catalago.alumno.show',compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $combomuni = Municipio::select('id','nombreMunicipio')
        ->get();
        $comboestado = Estado::select('id','nomestado')
        ->get();
        $comboestacivil = EstadoCivil::select('id','nEstadoCivil')
        ->get();
        $checkdisca = Discapacidad::select('id','nomdiscapacidad')
        ->get();
        return view('catalago.alumno.edit', compact('alumno','combomuni','comboestado','comboestacivil','checkdisca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
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
      return redirect()->route('alumno.index')->with('success','Actualización correcta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumno.index')->with('success','Registro eliminado');
    }
//Metodo para login api
    public function login(Request $request){
        $credenciales = $request->only('email','password');
        if( !Auth::attempt($credenciales)){
            return response([
                "message" => "Credenciales erroneas"
            ],401);
        }
        $accessToken = Auth::user()->createToken('Tokencontrol')->accessToken;
        return response([
            "user" => Auth::user(),
            "accessToken" => $accessToken
        ]);
    }
}
