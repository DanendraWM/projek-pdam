
@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Tambah User
            </strong>
            <div class="card-body card-block">
                <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama</label>
                           <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="judul" autofocus required>
                        @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror "  autofocus required/>
                        @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                    <label for="email" class="form-control-label">Lever User</label>
                    <div class="form-group input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>ADMIN</option>
                        <option value="1">KASUBID</option>
                        <option value="2">KABID</option>
                        <option value="3">KASAT</option>
                        <option value="4">DIREKTUR UMUM</option>
                        <option value="5">DIREKTUR UTAMA</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-control-label">password</label>
                        <input type="text" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror "  autofocus required/>
                        @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
