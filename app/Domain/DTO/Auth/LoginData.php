<?php

namespace App\Domain\DTO\Auth;

use App\Domain\DTO\Abstracts\DTO;

class LoginData extends DTO
{
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;
}
