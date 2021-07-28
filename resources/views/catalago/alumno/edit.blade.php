@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('alumno.index') }}"> Atras</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('alumno.update',$alumno->id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Matricula:</label>
                    <input type="text" name="matricula" value="{{$alumno->matricula}}" class="form-control" placeholder="Matrícula">
                </div>
                <div class="form-group">
                    <label>Nombre(s):</label>
                    <input type="text" name="nombre" value="{{$alumno->nombre}}" class="form-control" placeholder="Nombre(s)">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno:</label>
                    <input type="text" name="apaterno" value="{{$alumno->apaterno}}" class="form-control" placeholder="Apellido Paterno">
                </div>
                <div class="form-group">
                    <label>Apellido Materno:</label>
                    <input type="text" name="amaterno" value="{{$alumno->amaterno}}" class="form-control" placeholder="Apellido Materno">
                </div>
                <div class="form-group">
                    <label>curp:</label>
                    <input type="text" name="curp" value="{{$alumno->curp}}" class="form-control" placeholder="CURP">
                </div>
                <div class="form-group">
                    <label>Estado civil:</label>
                    <select id="estadociv" name="estadociv" class="form-control">
                        @foreach($comboestacivil as $selecec)
                        <option value="{{ $selecec->id}}">{{ $selecec->nEstadoCivil}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Dirección:</label>
                    <input type="text" name="direccion" value="{{$alumno->direccion}}" class="form-control" placeholder="Dirrección">
                </div>
                <div class="form-group">
                    <label>Colonia:</label>
                    <input type="text" name="colonia" value="{{$alumno->colonia}}" class="form-control" placeholder="Colonia">
                </div>
                <div class="form-group">
                    <label>Municipio:</label>
                    <select id="municipio" name="municipio" class="form-control">
                        @foreach($combomuni as $select)
                        <option value="{{ $select->id }}">{{ $select->nombreMunicipio }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <select id="estado" name="estado" class="form-control">
                        @foreach($comboestado as $selecte)
                        <option value="{{ $selecte->id}}">{{ $selecte->nomestado}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="date" name="fecha" value="{{$alumno->fechaNacimiento}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        @if($alumno->path)
                        <input type="file" class="form-control" value="{{Storage::url($alumno->path)}}"  name="foto" placeholder="Foto" accept="image/*">
                        @else
                        <input type="file" class="form-control" value="{{Storage::url($alumno->path)}}"  name="foto" placeholder="Foto" accept="image/*">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Discapacidad:</label>
                   
                    @foreach($checkdisca as $check)
                    <input type="checkbox" class="form-control" name="disca[]" value="{{ $check->id}}">{{ $check->nomdiscapacidad}}<br>
                    @endforeach
                </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
   
    </form>
@endsection