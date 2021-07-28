@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Discapacidad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('discapacidad.create') }}"> Agregar</a>
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
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($discapacidad as $disca)
        <tr>
            <td>{{ $disca->id }}</td>
            <td>{{ $disca->nomdiscapacidad}}</td>
            <td>
                <form action="{{ route('discapacidad.destroy',$disca->id) }}" method="POST"> 
                    <a class="btn btn-primary" href="{{ route('discapacidad.edit',$disca->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
       </div> 
   </div> 
@endsection