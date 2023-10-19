<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=> 'required|string|max:25',
            'prenom'=> 'required|string|max:255',
            'age'=>'required|integer',
            'email'=>'required|unique:utilisateurs,email|email|max:255'
        ];
    }

    public function messages()
  {
    return [
        'nom.required'=> 'ce champ est requis',
        'nom.string'=> 'ce champ doit etre une chaine de caractères',
        'prenom.required'=> 'ce champ est requis',
        'prenom.string'=> 'ce champ doit etre une chaine de caractères',
        'age.required'=> 'ce champ est requis',
        'email.required'=> 'ce champ est requis',
        'email.email'=> "le mail n'est pas dans le bon format",
        'email.unique'=> "le mail doit etre unique",
    ];
}
}
