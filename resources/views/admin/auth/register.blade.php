@extends('admin.layouts.auth.main')

@section('title', 'Register')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                        <h3>Register</h3>
                        <p>Silahkan Isi Data Anda Untuk Registrasi</p>
                    </div>
                    <form action="{{ route('process.register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>
                            </div>
                            {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                            </div>
                        </div> --}}
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="hidden" id="role" class="form-control" name="role">
                                </div>
                            </div>

                        </diV>

                        <a href="{{ route('login') }}">Have an account? Login</a>
                        <div class="clearfix mt-4">
                            <button class="btn btn-primary w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
