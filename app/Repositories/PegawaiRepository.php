<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PegawaiRepository implements PegawaiRepositoryInterface
{
    public function getAll()
    {
        return Pegawai::with('user')->get();
    }

    public function getById($id)
    {
        return Pegawai::with('user')->findOrFail($id);
    }

    public function create(array $data)
    {
        // return Pegawai::create($data);
        // Gunakan transaksi database untuk memastikan konsistensi data
        return DB::transaction(function () use ($data) {
            // Buat User terlebih dahulu
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('password'),
                'role' => 'pegawai', // Default role pegawai
            ]);

            // Buat Pegawai dan kaitkan dengan User
            $pegawai = Pegawai::create([
                'user_id' => $user->id,
                'jabatan' => $data['jabatan'] ?? null,
                'tanggal_bergabung' => $data['tanggal_bergabung'] ?? now(),
            ]);

            return [
                'user' => $user,
                'pegawai' => $pegawai,
            ];
        });
    }

    public function update($id, array $data)
    {

        return DB::transaction(function () use ($id, $data) {
            // cari data pegawai berdasarkan ID
            $pegawai = Pegawai::findOrFail($id);
            // update data user pegawai
            $pegawai->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
            // update data pegawai
            $pegawai->update([
                'jabatan' => $data['jabatan'] ?? null,
                'tanggal_bergabung' => $data['tanggal_bergabung'] ?? now(), // jika tidak ada tanggal_bergabung, ambil tanggal saat ini
            ]);

            return $pegawai;
        });
    }

    public function delete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        // Hapus data pegawai
        $pegawai->user->delete();
        $pegawai->delete();
        return true;
    }
}
