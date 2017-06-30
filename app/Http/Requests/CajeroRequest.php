<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;

class CajeroRequest extends FormRequest
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
        if(Input::has('idCajero')){
            $id=Input::get('idCajero');
            return [
                "idUser"=>"required|integer|min:1|max:11",
                "cedula_ruc"=>"required|min:10|max:13",
                "nombres"=>"required|min:3|max:25",
                "apellidos"=>"required|min:3|max:25",
                "fechaNac"=>"required|date", 
                "ciudadNac"=>"required|min:3|max:25",
                "direccion"=>"required|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|min:3|max:50",
                "estado"=>"required|alpha_num|size:1"
            ];
        }else{
            return [
                "idUser"=>"required|integer|min:1|max:11",
                "cedula_ruc"=>"required|min:10|max:13",
                "nombres"=>"required|min:3|max:25",
                "apellidos"=>"required|min:3|max:25",
                "fechaNac"=>"required|date", 
                "ciudadNac"=>"required|min:3|max:25",
                "direccion"=>"required|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|min:3|max:50",
                "estado"=>"required|alpha_num|size:1"
            ];
        }
    }
}