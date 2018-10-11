<?php

namespace Tesis;

use Illuminate\Database\Eloquent\Model;

class DetalleMulta extends Model
{
    protected $table = 'detalle_multa';
    protected $primaryKey = "iddetalle_multa";
    public $timestamps = false;

    protected $fillable = [
    	'idmulta',
    	'idfalla',
    	'valor_falla',
    ];
    protected $guarded = [
    ];
}
