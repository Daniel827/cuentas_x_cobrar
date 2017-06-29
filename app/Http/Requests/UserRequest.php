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
        if(Input::has('id')){
            $id=Input::get('id');
            return [
                 'name'=>'required|min:3|max:20',
                 'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',



            ];
        }else{
                   return [
          'name'=>'required|min:3|max:20',
          'email' => 'required|string|email|max:255',
            'password' =>'required|string|min:6',

        ];
        }
    }

    
}
