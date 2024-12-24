<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiStoreRequest;
use App\Http\Requests\PegawaiUpdateRequest;
use App\Services\PegawaiService;

class PegawaiController extends Controller
{
    protected $pegawaiService;

    public function __construct(PegawaiService $pegawaiService)
    {
        $this->pegawaiService = $pegawaiService;
    }

    public function index()
    {
        $pegawai = $this->pegawaiService->getAllPegawai();
        return view('admin.pegawai.pegawai', compact('pegawai'));
    }

    public function show($id)
    {
        $pegawai = $this->pegawaiService->getPegawaiById($id);
        return response()->json([
            'id' => $pegawai->id,
            'name' => $pegawai->user->name,
            'email' => $pegawai->user->email,
            'jabatan' => $pegawai->jabatan,
            'tanggal_bergabung' => $pegawai->tanggal_bergabung,
        ]);
        // return view('admin.pegawai.detail-pegawai', compact('pegawai'));
    }

    public function store(PegawaiStoreRequest $request)
    {
        $validatedData = $request->validated();

        $pegawai = $this->pegawaiService->createPegawai($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        try {
            $pegawai = $this->pegawaiService->getPegawaiById($id);
            return view('admin.pegawai.pegawai-edit', compact('pegawai'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('pegawai.index')->with('error', 'Pegawai tidak ditemukan.');
        }
    }

    public function update($id, PegawaiUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $pegawai = $this->pegawaiService->updatePegawai($id, $validatedData);
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $pegawai = $this->pegawaiService->deletePegawai($id);
        // Kembalikan response JSON dengan status 200
        return response()->json([
            'message' => 'Pegawai berhasil dihapus',
        ], 200);
        // return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
