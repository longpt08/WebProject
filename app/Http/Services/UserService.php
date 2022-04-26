<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function checkIfExistedAccount(string $email, ?string $password = null): ?User
    {
        $query = User::query()->where('email', $email);
        if ($password) {
            $query->where('password', $password);
        }
        return $query->first();
    }
}
