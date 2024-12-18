<?php

namespace App\Services;

use App\Repositories\PegawaiRepositoryInterface;

class PegawaiService
{
    protected $pegawaiRepository;

    public function __construct(PegawaiRepositoryInterface $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function getAllPegawai()
    {
        return $this->pegawaiRepository->getAll();
    }

    public function getPegawaiById($id)
    {
        return $this->pegawaiRepository->getById($id);
    }

    public function createPegawai($data)
    {
        return $this->pegawaiRepository->create($data);
    }

    public function updatePegawai($id, $data)
    {
        return $this->pegawaiRepository->update($id, $data);
    }

    public function deletePegawai($id)
    {
        return $this->pegawaiRepository->delete($id);
    }
}
