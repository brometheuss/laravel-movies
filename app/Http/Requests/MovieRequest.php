<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'movieTitle' => 'required|unique:movie,title|min:2',
            'movieDescription' => 'required|min:10',
            'dateReleased' => 'required|regex:/^[1-9][0-9]{3,3}-[0-9]{2,2}-[0-9]{2,2}$/',
            'genreId' => 'required|exists:genre,id_genre',
            'moviePic' => 'required|file|mimes:jpg,jpeg,png,gif|max:3000'
        ];
    }

    public function messages()
    {
        return [
            'movieTitle.required' => 'Movie must have a title',
            'movieTitle.unique' => 'Movie with that name already exists in the database',
            'movieTitle.min' => 'Movie title must be at least 2 letters long',
            'movieDescription.required' => 'Movie must have a description',
            'movieDescription.min:10' => 'Movie description must be at least 10 letters long',
            'dateReleased.required' => 'Movie must have a release date',
            'dateReleased.regex' => 'Release date must be in in yyyy-mm-dd format.',
            'genreId.required' => 'Please select genre',
            'genreId.exists' => 'Genre doesnt exist in the database',
            'moviePic.required' => 'Please upload a photo',
            'moviePic.mimes' => 'Following extensions are allowed: .jpg, .jpeg, .png, .gif',
            'moviePic.max' => 'Maximum photo size is < 3MB'
        ];
    }
}
