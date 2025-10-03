<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FormPostRequest extends FormRequest
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
            "title" => ["required", "min:4"],
            "content" => ["required", "min:10"],
            "slug" => ["required", "regex:/^[a-z0-9-]+$/", Rule::unique('posts')->ignore($this->route()->parameter('post'))], //regex pour n'autoriser que les lettres minuscules, les chiffres et les tirets. ignore permet d'ignorer l'unicité de l'article en cours d'édition
        ];

    }

    protected function prepareForValidation() //ajoute le slug si il n'est pas fourni
    {
        $this->merge([ //merge permet de fusionner les données existantes avec les nouvelles

            "slug" => $this->input('slug') ?: Str::slug($this->input('title')), //si le slug n'est pas fourni, on le génère à partir du titre
        ]);
    
    }

}