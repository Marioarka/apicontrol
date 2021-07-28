<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table ='alumno';
    protected $guarded = ['id','created_at','updated_at'];
  
    //Relacion mucho a muchos con tabla discapacidad
    public function discapacidad()
    {
        return $this->belongsToMany('App\Models\Discapacidad');
    }

}
