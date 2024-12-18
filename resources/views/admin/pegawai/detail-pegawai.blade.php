@extends('admin.layouts.main')

@section('title', 'Dashboard - Detail Pegawai')

@section('content')
{{-- {{ $pegawai->delete() }} --}}
    <h2>Detail Pegawai</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $pegawai->user->name }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="pegawai-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="pegawai-email" value="{{ $pegawai->user->email }}" readonly>
            </div>
            <div class="mb-3">
                <label for="pegawai-jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="pegawai-jabatan" value
                ="{{ $pegawai->jabatan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="pegawai-tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="tanggal_bergab
                ung" value="{{ $pegawai->tanggal_bergabung }}" readonly>
            </div>
            <div class="mb-3">
                <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Pegawai</button>
                </form>
            </div>
        </div>
    </div>
@endsection
