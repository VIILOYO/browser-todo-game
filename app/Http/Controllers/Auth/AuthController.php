<?php

namespace App\Http\Controllers\Auth;

use App\Domain\DTO\Auth\LoginData;
use App\Domain\DTO\Auth\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService,
    )
    {
    }

    /**
     * @return View
     */
    public function registration(): View
    {
        return view('auth.registration')
            ->with(['title' => 'Регистрация']);
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     *
     * @throws ValidatorException
     */
    public function acceptRegistration(RegisterRequest $request): RedirectResponse
    {
        $user = $this->authService->register(
            new RegisterData(
                $request->validated()
            )
        );

        if ($user === null) {
            return redirect()->back()->withErrors([
                'auth-error' => __('errors.auth.register-fault')
            ])->withInput($request->input());
        }

        Auth::login($user);

        return redirect()->route('profile');
    }

    /**
     * @return View
     */
    public function login(): View
    {
        return view('auth.login')
            ->with(['title' => 'Авторизация']);
    }

    public function acceptLogin(LoginRequest $request): RedirectResponse
    {
        $user = $this->authService->login(
            new LoginData(
                $request->validated()
            )
        );

        if ($user === null) {
            return redirect()->back()->withErrors([
                'auth-error' => __('errors.auth.login-fault')
            ])->withInput($request->input());
        }

        Auth::login($user);

        return redirect()->route('profile');
    }
}
