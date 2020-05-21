<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStagaire extends FormRequest
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
            'cne' => 'required|min:6|max:6',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'sexe' => 'min:1|max:1',
            'adresse' => 'required', 
            'tele' => 'required',
            'email' => 'required|email',
            'nom_projet' => 'required',
            'employee_id' => 'required',
            'job_id' => 'required'
        ];
    }
}
