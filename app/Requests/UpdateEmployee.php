<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployee extends FormRequest
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

    // public function messages()
    // {
    //     return
    //     [
    //         'cin.unique' =>  'Cin déja exit',
    //         "email.unique"=> 'Email déja exite',
    //         "tele.unique"=>  'Tele déja exite',
            
    //     ];
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'cin' => 'required|min:6|max:6',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'sexe' => 'min:1|max:1',
            'adresse' => 'required', 
            'email' => 'required|email',
            'tele' => 'required',
            
            
        ];
    }
}
