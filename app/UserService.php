<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private function makePassword(User $user, string $password)
    {
        $user->password = Hash::make($password);
    }

    public function create(array $data): User
    {
        $user = User::create($data);
        $this->makePassword($user, $data['password']);

        $user->save();

        return $user;
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);
        $this->makePassword($user, $data['password']);
        $user->save();

        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
        $user->save();
    }
}
