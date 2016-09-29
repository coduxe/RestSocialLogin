<?php

namespace Modules\RestSocialLogin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestSocialLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provider' => 'required|string|in:normal,facebook,google,twitter,github,linkedin,bitbucket',
            'email' => 'required_if:provider,normal',
            'password' => 'required_if:provider,normal'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
