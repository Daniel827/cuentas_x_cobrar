<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;


class UserRequest extends FormRequest
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
        if(Input::has('idUser')){
            $id=Input::get('idUser');
            return [
            'rol'=>'required|in:admin,cajero',
            ];
        }else{
                   return [
          'name'=>'required|min:3|unique:users|max:20|regex:/^[a-z0-9]+$/i',
                 'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'rol'=>'required|in:admin,cajero',
        ];
        }
    }


}
