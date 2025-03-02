<?php

namespace App\Http\Requests;

class UserUpdateRequest extends BaseRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'password' => 'required|min:5|max:15',
            'comment' => 'string',
            'ip' => 'string|ipv4',
        ];
    }
}
