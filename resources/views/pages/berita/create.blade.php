
@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Tambah Berita
            </strong>
            <div class="card-body card-block">
                <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul" class="form-control-label">Judul Berita</label>
                           <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" autofocus required>
                        @error('judul') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="deskripsi" class="form-control-label">Deskripsi Berita</label>
                        <input type="text" name="deskripsi" value="{{old('deskripsi')}}" class="form-control @error('deskripsi') is-invalid @enderror "  autofocus required/>
                        @error('deskripsi') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="file" class="form-control-label">Upload File Berita</label>
                        <input type="file" name="file" value="{{old('file')}}" class="form-control @error('file') is-invalid @enderror "  autofocus required/>
                        @error('file') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_media" class="form-control-label">Nama Media </label>
                        <input type="text" name="nama_media" value="{{old('nama_media')}}" class="form-control @error('nama_media') is-invalid @enderror "  autofocus required/>
                        @error('nama_media') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
