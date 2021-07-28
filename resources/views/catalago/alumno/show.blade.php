@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Alumno</h2>
            </div>
            <div class="pull-right float-right">
                <a class="btn btn-primary" href="{{ route('alumno.index') }}"> atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $alumno->matricula}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $alumno->nombre}}
            </div>
        </div>
    </div>
@endsection