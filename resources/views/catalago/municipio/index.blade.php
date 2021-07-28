@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Municipios MX</h2>
            </div>
            <div class="pull-right">
            
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
            <th>No</th>
            <th>Estado</th>
            <th>Estado</th>
        </tr>
        @foreach ($municipios as $municipio)
        <tr>
            <td>{{ $municipio->claveMunicipio}}</td>
            <td>{{ $municipio->nomestado}}</td>
            <td>{{$municipio->nombreMunicipio}}</td>
            
        </tr>
        @endforeach
    </table>  
       </div> 
   </div> 
@endsection
