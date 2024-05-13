<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class BlogCreateRequest extends FormRequest
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
            'blog_title' => 'required|max:255',
            'url' => 'required|unique:blogs',
            'blog_content' => 'required',
            'blog_status' => 'required',
            'blog_category' => 'required|array',
            'blog_category.*' => 'string',
            'blog_thumbnail' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return response()->json([
            'success' => $validator->errors(),], 403);
    }
}
