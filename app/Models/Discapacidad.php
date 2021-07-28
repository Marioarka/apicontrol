<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    use HasFactory;
    protected $fillable =['nomdiscapacidad'];
    protected $table ='discapacidad';
    //relacion mucho a mucho con tabla alumno
    public function alumno()
    {
        return $this->belongsToMany('App\Models\Alumno');
    }
}
