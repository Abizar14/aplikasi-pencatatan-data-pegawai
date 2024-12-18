<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Handle user login.
     *
     * @param array $credentials
     * @return mixed
     */
    public function login(array $credentials)
    {
        $user = $this->authRepository->login($credentials);

        if ($user) {
            if ($user->role === 'admin') {
                return ['redirect' => 'admin', 'user' => $user];
            } elseif ($user->role === 'pegawai') {
                return ['redirect' => 'pegawai', 'user' => $user];
            }
        }

        return null;
    }

    /**
     * Handle user registration.
     *
     * @param array $data
     * @return mixed
     */
    public function register(array $data)
    {
        return $this->authRepository->register($data);
    }

    /**
     * Handle user logout.
     *
     * @return void
     */
    public function logout()
    {
        $this->authRepository->logout();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return mixed
     */
    public function getAuthenticatedUser()
    {
        return $this->authRepository->getAuthenticatedUser();
    }
}
