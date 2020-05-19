<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStore extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return
        [
            'cin.unique' =>  'Cin déja exit',
            "email.unique"=> 'Email déja exite',
            "tele.unique"=>  'Tele déja exite',
            "date_naissance.before"=>"date doit etre mois de 01/01/2020",
            "date_livraison.after" =>"date incorrect"
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                "cin" => ['unique:clients'],
                "date_naissance" =>"before:01/01/2001",
                "email" =>'required|unique:clients',
                "tele" => "required|unique:clients",
                "date_naissance" => "date|before:01/01/2000",
              ];
    }
}
