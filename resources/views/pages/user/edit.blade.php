@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                edit User
            </strong>
            <div class="card-body card-block">
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="name" autofocus value="{{ $user->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="form-control @error('email') is-invalid @enderror " autofocus required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Lever User</label>
                        <div class="form-group input-group mb-3">
                            <select class="custom-select" name="role" id="inputGroupSelect01">
                                <option {{ $user->level == 'admin' ? 'selected' : false }} value="admin">ADMIN</option>
                                <option {{ $user->level == 'kasubid' ? 'selected' : false }} value="kasubid">KASUBID
                                </option>
                                <option {{ $user->level == 'kabid' ? 'selected' : false }} value="kabid">KABID</option>
                                <option {{ $user->level == 'kasad' ? 'selected' : false }} value="kasad">KASAT</option>
                                <option {{ $user->level == 'direktur umum' ? 'selected' : false }} value="direktur umum">
                                    DIREKTUR
                                    UMUM</option>
                                <option {{ $user->level == 'direktur utama' ? 'selected' : false }}
                                    value="direktur utama">
                                    DIREKTUR UTAMA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-control-label">password baru</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "
                            autofocus placeholder="password baru" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ubah User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
