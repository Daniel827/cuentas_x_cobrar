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
            "idCajero"=>"",
            "idCliente"=>"",
            "descripcion"=>"required|max:300",
            "numeroPago"=>"required|unique:pagos,numeropago,".$id."idPago",
            "totalPago"=>"required|numeric"
            //
        ];
     }else{
        return[
            "idCajero"=>"required",
            "idCliente"=>"required",
           "descripcion"=>"required|max:300",
            "numeroPago"=>"required|unique:pagos",

    public function rules(){
        return[
            "idCajero"=>"required|exists:cajeros,idCajero",
            "idCliente"=>"required|numeric",
           "descripcion"=>"required|string|max:100",
           "idFactura"=>"required|array",
           "idTipoPago"=>"required|array",
           "pago"=>"required|array",

        ];
     }
}
