<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSchoolRequest extends FormRequest
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
            'name' => 'required',
            'statut_id' => 'required',
            'type'=> 'required',
            'date_creation'=>'required|date',
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'ville_id'=>'required',
            'quartier_id'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'scholarite_info'=>'required',
            'logo' => 'image|max:100000',
            'cover' => 'image|max:200000'
        ];
    }
}
