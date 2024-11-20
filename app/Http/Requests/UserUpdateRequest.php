<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\UserService;
use App\Http\CustomModels\User;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = UserService::find($this->route('id'));

        if (!$user) {
            return [];
        }

        return [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'username' => 'required|string|max:50|in:' . $user->Username,
            'email' => 'required|email|max:255|in:' . $user->Email,
            'gender' => 'required|in:male,female,other',
        ];
    }
}
