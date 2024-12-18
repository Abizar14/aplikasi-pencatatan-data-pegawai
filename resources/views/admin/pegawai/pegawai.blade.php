@extends('admin.layouts.main')
@section('title', 'Dashboard - Pegawai')

@section('content')
    {{-- session error --}}


    <section class="section">
        {{-- Form Tambah Pegawai --}}
        <div class="card">
            <div class="card-header">
                <h4>Tambah Pegawai</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pegawai</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan"
                            class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}">
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                        <input type="date" name="tanggal_bergabung" id="tanggal_bergabung"
                            class="form-control @error('tanggal_bergabung') is-invalid @enderror"
                            value="{{ old('tanggal_bergabung') }}">
                        @error('tanggal_bergabung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Tambah Pegawai</button>
                </form>
            </div>
        </div>

        {{-- Tabel Pegawai --}}
        <div class="card">
            <div class="card-header">
                <h4>Tabel Pegawai</h4>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Tanggal Bergabung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->user->email }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->tanggal_bergabung }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-primary"><i
                                            data-feather="edit" width="20"></i></a>
                                    {{-- <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i data-feather="trash"
                                                width="20"></i></button>
                                    </form> --}}
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onclick="showEmployee({{ $p->id }})">
                                        <i data-feather="eye" width="20"></i>
                                    </button>

                                    {{-- <a href="{{ route('pegawai.destroy', $p->id) }}" class="btn btn-danger">delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal untuk menampilkan detail pegawai -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="pegawai-name" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control" id="pegawai-name" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pegawai-email" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="pegawai-email" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pegawai-jabatan" class="col-form-label">Jabatan:</label>
                                        <input type="text" class="form-control" id="pegawai-jabatan" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pegawai-tanggal_bergabung" class="col-form-label">Tanggal
                                            Bergabung:</label>
                                        <input type="text" class="form-control" id="pegawai-tanggal_bergabung"
                                            disabled>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!-- Tombol Hapus Data Pelanggan -->
                                <button type="button" class="btn btn-danger" id="delete-button"
                                    onclick="deleteEmployee()">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                // text sesuai session success
                text: '{{ session('success') }}',
                // text: 'Data pegawai telah ditambahkan',
                icon: 'success',
                width: 600,
                padding: "3em",
                color: "#716add",
                background: "#fff",
                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url("{{ asset('assets/images/cat-space-unscreen.gif') }}")
                                    left top
                                    repeat
                                `
            })
        </script>
    @endif

    <script>
        var currentEmployeeId = null;

        function showEmployee(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/pegawai/show/' + id,
                method: 'GET',
                success: function(response) {
                    $('#pegawai-name').val(response.name);
                    $('#pegawai-email').val(response.email);
                    $('#pegawai-jabatan').val(response.jabatan);
                    $('#pegawai-tanggal_bergabung').val(response.tanggal_bergabung);

                    currentEmployeeId = response.id;
                    console.log(currentEmployeeId)
                    $('#delete-button').attr('onclick', 'deleteEmployee(' + currentEmployeeId + ')');
                },
                error: function() {
                    alert('Failed to fetch employee data');
                }
            });
        }

        function deleteEmployee() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pegawai ini akan dihapus!",
                icon: 'warning',
                width: 600,
                padding: "3em",
                color: "#716add",
                background: "#fff",
                backdrop: `
                rgba(0,0,123,0.4)
                url("{{ asset('assets/images/cat-space-unscreen.gif') }}")
                left top
                no-repeat
                `,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#716add',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/pegawai/' + currentEmployeeId,
                        method: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token
                        },
                        success: function(response) {
                            console.log(response.message); // Log response di console
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data pegawai telah dihapus',
                                icon: 'success',
                                width: 600,
                                padding: "3em",
                                color: "#716add",
                                background: "#fff",
                                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url("{{ asset('assets/images/cat-space-unscreen.gif') }}")
                                    left top
                                    repeat

                                `
                            }).then(() => {
                                location.reload();
                            });

                        },
                        error: function(xhr) {
                            console.error(xhr.responseText); // Log error di console
                            Swal.fire('Gagal!', 'Terjadi kesalahan dalam menghapus data.', 'error');
                        }
                    });

                }
            });
        }
    </script>
@endpush
