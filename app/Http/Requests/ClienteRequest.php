<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;


class ClienteRequest extends FormRequest
{
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
        if(Input::has('IDCLIENTE')){
            $id=Input::get('IDCLIENTE');
            return [
                "idUser"=>"required|integer|exists:users,id|unique:cajeros,idUser,".$id.",idCajero",
                "cedula_ruc"=>"required|cedula_ruc|unique:cajeros,cedula_ruc,".$id.",idCajero",
                "nombres"=>"required|string|min:3|max:25",
                "apellidos"=>"required|string|min:3|max:25",
                "fechaNac"=>"required|date",
                "ciudadNac"=>"required|string|min:3|max:25",
                "direccion"=>"required|string|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|email|min:10|max:50|unique:cajeros,email,".$id.",idCajero",
                "estado"=>"required|in:A,I"
            ];
        }else{
            return [
                "idUser"=>"required|integer|exists:users,id|unique:cajeros",
                "cedula_ruc"=>"required|cedulaRuc|unique:cajeros|min:10|max:13",
                "nombres"=>"required|min:3|max:25",
                "apellidos"=>"required|min:3|max:25",
                "fechaNac"=>"required|date",
                "ciudadNac"=>"required|string|min:3|max:25",
                "direccion"=>"required|string|min:3|max:25",
                "telefono"=>"required|alpha_num|size:10",
                "email"=>"required|email|unique:cajeros|min:10|max:50",
                "estado"=>"required|in:A,I"
            ];
        }
    }
}
