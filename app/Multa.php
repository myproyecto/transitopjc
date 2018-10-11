<?php

namespace Tesis;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multa';
    protected $primaryKey = "idmulta";
    public $timestamps = false;

    protected $fillable = [
    	'id',
        'idconductor'
    	'tipo_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
        'datos_vehiculo'
    	'estado',
    ];
    protected $guarded = [
    ];
}
