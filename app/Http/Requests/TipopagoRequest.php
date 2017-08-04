<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
class TipoPagoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
      if(Input::has('idtipopago')){
        $id=Input::get('idtipopago');
        return [
            "nombre"=>"required|min:3|max:30|unique:tipopagos,nombre,".$id.",idtipopago",
            "referencia"=>"required|string|min:5|max:20",
            "descripcion"=>"nullable|string|max:200",
            "estado"=>"required|in:A,I"
        ];
      }else{
        return [
            "nombre"=>"required|min:3|max:30|unique:tipopagos",
            "referencia"=>"required|string|min:5|max:20",
            "descripcion"=>"nullable|string|max:200",
            "estado"=>"required|in:A,I"
        ];
      }
    }
}
