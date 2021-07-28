@extends('layouts.app')
@section('content')
</br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right float-right">
            <a class="btn btn-primary " href="{{ route('alumno.index') }}"> Atras</a>
        </div>
        <div class="pull-left">
            <h2>Agregar Nuevo</h2>
        </div>
       
    </div>
</div>
</br>
@if ($errors->any())
    <div class="alert alert-danger">
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('alumno.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
  
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Matricula:</label>
                <input type="text" name="matricula" class="form-control" placeholder="Matrícula">
            </div>
            <div class="form-group">
                <label>Nombre(s):</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)">
            </div>
            <div class="form-group">
                <label>Apellido Paterno:</label>
                <input type="text" name="apaterno" class="form-control" placeholder="Apellido Paterno">
            </div>
            <div class="form-group">
                <label>Apellido Materno:</label>
                <input type="text" name="amaterno" class="form-control" placeholder="Apellido Materno">
            </div>
            <div class="form-group">
                <label>curp:</label>
                <input type="text" name="curp" class="form-control" placeholder="CURP">
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
                <input type="text" name="direccion" class="form-control" placeholder="Dirrección">
            </div>
            <div class="form-group">
                <label>Colonia:</label>
                <input type="text" name="colonia" class="form-control" placeholder="Colonia">
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
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Foto:</strong>
                    <input type="file" class="form-control"  name="foto" placeholder="Foto" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" value="6" name="disca[]">
                <label>Discapacidad:</label>
                @foreach($checkdisca as $check)
                <input type="checkbox" class="form-control" name="disca[]" value="{{ $check->id}}">{{ $check->nomdiscapacidad}}<br>
                @endforeach
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>
@endsection