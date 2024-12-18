<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * Handle user login.
     *
     * @param array $credentials
     * @return mixed
     */
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }
        return null;
    }

    /**
     * Handle user registration.
     *
     * @param array $data
     * @return User
     */
    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'pegawai'; // Default level for new registrations
        $user = User::create($data);

        // Membuat data pegawai yang berhubungan dengan user yang baru dibuat
        $pegawaiData = [
            'user_id' => $user->id, // ID user yang baru dibuat
            'jabatan' => 'Anggota', // Sesuaikan dengan data pegawai
            'tanggal_bergabung' => now(),
        ];

        Pegawai::create($pegawaiData);

        return $user;
    }

    /**
     * Handle user logout.
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return mixed
     */
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }
}
