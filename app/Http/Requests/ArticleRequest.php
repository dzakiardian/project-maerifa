<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'min:3', 'unique:articles,slug'],
            'categories' => ['required'],
            'thubnail' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048'],
            'content' => ['required'],
        ];
    }
}
