<?php

namespace Tesis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultasFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required',
            'idconductor'=>'required',
            'tipo_comprobante'=>'required |max:20',
            'num_comprobante'=>'required |max:10',
            'idfalla'=>'required',
            'datos_vehiculo'=>'required |max:50',
            'valor_falla'=>'required',
        ];
    }
}
