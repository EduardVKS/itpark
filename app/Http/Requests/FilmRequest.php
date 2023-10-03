<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|max:255|unique:films,title',
            'poster_url' => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
            'genres.*' => 'accepted',
        ];
        
        if ($this->route()->named('films.update'))  {
            $rules['title'] .= ','.$this->route()->parameter('film')->id;
        }

        return $rules;
    }
}
