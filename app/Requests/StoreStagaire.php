<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStagaire extends FormRequest
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
            'cne' => 'required|min:6|max:6|unique:stagaires',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'adresse' => 'required', 
            'email' => 'required|email|unique:stagaires',
            'tele' => 'required|numeric',
            'sexe' => 'min:1|max:1',
            'cindoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'cvdoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'assurancedoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'lettredoc' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
}
