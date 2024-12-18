<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProsesLoginRequest;
use App\Http\Requests\ProsesRegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display the login page or redirect if user is authenticated.
     */
    public function login()
    {
        $user = $this->authService->getAuthenticatedUser();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role === 'pegawai') {
                return redirect()->intended('pegawai');
            }
        }

        return view('admin.auth.login');
    }

    /**
     * Handle login process.
     */
    public function process_login(ProsesLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $user = $this->authService->login($credentials);

        // dd($user);
        if (is_array($user) && isset($user['role'])) {
            if ($user['role'] == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user['role'] == 'pegawai') {
                return redirect()->intended('pegawai');
            }
        }

        return redirect()->back()->withErrors(['Invalid credentials']);

    }

    /**
     * Display the registration page.
     */
    public function register()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle Register Process
     */
    public function process_register(ProsesRegisterRequest $request)
    {
        $this->authService->register($request->all());
        return redirect()->intended('login');
    }

    /**
     * Handle Logout
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
