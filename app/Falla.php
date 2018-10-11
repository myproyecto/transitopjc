<?php

namespace Tesis;

use Illuminate\Database\Eloquent\Model;

class Falla extends Model
{
    protected $table = 'falla';
    protected $primaryKey = "idfalla";
    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'imagen',
    	'estado'
    ];
    protected $guarded =[
    ];
}
