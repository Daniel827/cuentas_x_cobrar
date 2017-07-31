<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PagoRequest extends FormRequest
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
    public function rules(){
        return[
            "idcajero"=>"required|exists:cajeros,idcajero",
            "idcliente"=>"required|numeric",
           "descripcion"=>"required|string|max:100",
           "idfactura"=>"required|array",
           "idtipopago"=>"required|array",
           "pago"=>"required|array",
        ];
     }
}
