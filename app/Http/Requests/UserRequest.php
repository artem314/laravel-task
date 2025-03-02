<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:5|max:15',
            'comment' => 'string',
            'ip' => 'string|ipv4',
        ];
    }
}
