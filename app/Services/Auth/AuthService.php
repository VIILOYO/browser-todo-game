<?php

namespace App\Services\Auth;

use App\Domain\DTO\Auth\LoginData;
use App\Domain\DTO\Auth\RegisterData;
use App\Models\User;
use App\Repositories\User\UserRepositoryEloquent;
use Illuminate\Support\Facades\Hash;
use Prettus\Validator\Exceptions\ValidatorException;

class AuthService
{
    public function __construct(
        private readonly UserRepositoryEloquent $userRepository,
    )
    {
    }

    /**
     * @param RegisterData $data
     * @return User|null
     *
     * @throws ValidatorException
     */
    public function register(RegisterData $data): ?User
    {
        return $this->userRepository->create([
            'name' => $data->name,
            'email'=> $data->email,
            'password' => Hash::make($data->password)
        ]);
    }

    /**
     * @param LoginData $data
     * @return User|null
     */
    public function login(LoginData $data): User|null
    {
        $user = $this->findByEmail($data->email);

        if (Hash::check($data->password, $user?->password)) {
            return $user;
        }

        return null;
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->userRepository->findWhere([
            'email' => $email
        ])->first();
    }
}
