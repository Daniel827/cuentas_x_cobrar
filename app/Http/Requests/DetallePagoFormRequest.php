<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetallePagoFormRequest extends FormRequest
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
      if(Input::has('idDetalle')){
          $id=Input::Get('idDetalle');
          return[
              "idPago"=>"required|detallespago,idPago,".$id.",idPago|alpha_num|size:8",
              "idTipoPago"=>"required|min:3|max:20",
              "idFactura"=>"required|min:10|max:200",
              "pago"=>"required|min:10|max:200",


          ];
      }else{
          return [
              "idPago"=>"required|unique:tipopagos|alpha_num|size:8",
              "idTipoPago"=>"required|min:3|max:20",
              "idFactura"=>"required|min:10|max:200",
              "pago"=>"required|min:10|max:200",
              


          ];
      }
    }
}
