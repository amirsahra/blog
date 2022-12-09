<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title' => 'max:225',
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg', 'max:2000'];
        } else {
            return [
                'title' => 'required|max:225',
                'slug' => 'required|max:225|unique:posts,slug',
                'content' => 'required',
                'category_id' => 'required|exists:categories,id',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg', 'max:2000'];
        }
    }
}
