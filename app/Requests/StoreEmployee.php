<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
        return [
            //
            'cin' => 'required|min:6|max:6|unique:employees',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'adresse' => 'required', 
            'salaire' => 'required',
            'email' => 'required|email',
            'tele' => 'required|numeric',
            'sexe' => 'min:1|max:1',
            'cindoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'diplomedoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'contratdoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
}
