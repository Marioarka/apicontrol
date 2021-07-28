@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Discapacidad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('alumno.create') }}"> Agregar</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="card">
       <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>Matricula</th>
            <th>Nombre completo</th>
            <th>CURP</th>
            <th>Estado civil</th>
            <th>Direccion</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th>Fecha nacimiento</th>
            <th width="150px">Foto</th>
            <th>Discapacidad</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->matricula}}</td>
            <td>{{ $alumno->nombre}} {{ $alumno->apaterno}} {{$alumno->amaterno}} </td>
            <td>{{ $alumno->curp}}</td>
            <td>{{ $alumno->estadocivil}}</td>
            <td>{{ $alumno->direccion}} {{ $alumno->colonia}}</td>
            <td>{{ $alumno->nommuni}}</td>
            <td>{{ $alumno->nomestado}}</td>
            <td>{{ $alumno->fechaNacimiento}}</td>
            <td><img src="{{ $alumno->path }}" alt="image" width="150px"></td>
            <td>{{$alumno->nombrediscapacidad}}</td>
            <td>
                <form action="{{ route('alumno.destroy',$alumno->idlum) }}" method="POST"> 
                   
                    <a class="btn btn-primary" href="{{ route('alumno.edit',$alumno->idlum) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
       </div> 
   </div> 
@endsection