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
            $id=Input::get('idTipoPago');
            return[
                "nombre"=>"required|string|min:3|max:20",
                "referencia"=>"required|string|min:5|max:20",
                "descripcion"=>"nullable|string|max:200",
                "estado"=>"required|in:A,I"

            ];
        }else{
            return [
                "nombre"=>"required|string|min:3|max:20",
                "referencia"=>"required|string|min:5|max:20",
                "descripcion"=>"nullable|string|max:200",
                "estado"=>"required|in:A,I"
            ];
        }
    }
}
