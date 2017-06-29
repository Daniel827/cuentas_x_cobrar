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
    public function rules()
    {
        if(Input::has('idPago')){
            $id=Input::Get('idPago');
        return [
            "descripcion"=>"required|min:10|max:300",
            "fecha"=>"required|date(dd-mm-aaaa)",
            "numeroPago"=>"required|unique:pagos,numeropago,".$id."idPago",
            "totalPago"=>"required|numeric"
            //
        ];
     }else{
        return[
           "descripcion"=>"required|min:10|max:300",
            "fecha"=>"required|date(dd-mm-aaaa)",
            "numeroPago"=>"required|numeric",
            "idFactura"=>"required|array",
            "idTipoPago"=>"required|array"
        ];
     }
    }
}
