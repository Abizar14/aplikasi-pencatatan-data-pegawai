<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function login(array $credentials);
    public function register(array $data);
    public function logout();
    public function getAuthenticatedUser();
}
