@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Tambah User
            </strong>
            <div class="card-body card-block">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="name" autofocus required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror " autofocus required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Lever User</label>
                        <div class="form-group input-group mb-3">
                            <select class="custom-select" name="role" id="inputGroupSelect01">
                                <option selected value="admin">ADMIN</option>
                                <option value="kasubid">KASUBID</option>
                                <option value="kabid">KABID</option>
                                <option value="kasad">KASAT</option>
                                <option value="direktur umum">DIREKTUR UMUM</option>
                                <option value="direktur utama">DIREKTUR UTAMA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-control-label">password</label>
                        <input type="password" name="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror " autofocus required />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">BUAT USER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
