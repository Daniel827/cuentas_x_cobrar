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
        if(Input::has('idcajero')){
            $id=Input::get('idcajero');
            return [
                "iduser"=>"required|integer|exists:users,id|unique:cajeros,iduser,".$id.",idcajero",
                "cedula_ruc"=>"required|cedula_ruc|unique:cajeros,cedula_ruc,".$id.",idcajero",
                "nombres"=>"required|string|min:3|max:25",
                "apellidos"=>"required|string|min:3|max:25",
                "fechanac"=>"required|date",
                "ciudadnac"=>"required|string|min:3|max:25",
                "direccion"=>"required|string|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|email|min:10|max:50|unique:cajeros,email,".$id.",idcajero",
                "estado"=>"required|in:A,I"
            ];
        }else{
            return [
                "iduser"=>"required|integer|exists:users,id|unique:cajeros",
                "cedula_ruc"=>"required|cedula_ruc|unique:cajeros|min:10|max:13",
                "nombres"=>"required|min:3|max:25",
                "apellidos"=>"required|min:3|max:25",
                "fechanac"=>"required|date",
                "ciudadnac"=>"required|string|min:3|max:25",
                "direccion"=>"required|string|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|email|unique:cajeros|min:10|max:50",
                "estado"=>"required|in:A,I"
            ];
        }
    }
}
