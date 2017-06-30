<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;
class TipopagoRequest extends FormRequest
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
        if(Input::has('idTipoPago')){
            $id=Input::Get('idTipoPago');
            return[
                "codigo"=>"required|unique:tipopagos,codigo,".$id.",idTipoPago|alpha_num|size:8",
                "nombre"=>"required|min:3|max:20",
                "referencia"=>"required|min:10|max:200",
                "descripcion"=>"required|min:10|max:200",
                "estado"=>"required|max:5"
 
            ];
        }else{
            return [
                "codigo"=>"required|unique:tipopagos|alpha_num|size:8",
                "nombre"=>"required|min:3|max:20",
                "referencia"=>"required|min:10|max:200",
                "descripcion"=>"required|min:10|max:200",
                "estado"=>"required|min:1|max:5"
            ];
        }
    }
}
