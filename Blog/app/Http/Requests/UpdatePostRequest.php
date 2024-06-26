<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $post = Post::findOrFail($this->post);
        return $post->user_id == Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'   => ['required', 'string', 'max:200'],
            'body'    => ['required', 'string', 'min:100'],
            'enabled' => ['required', 'boolean'],
        ];
    }
}
