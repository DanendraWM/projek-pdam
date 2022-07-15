
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
                        <label for="name" class="form-control-label">Judul Berita</label>
                           <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="judul" autofocus required>
                        @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="caption" class="form-control-label">Caption Berita</label>
                        <input type="text" name="caption" value="{{old('caption')}}" class="form-control @error('caption') is-invalid @enderror "  autofocus required/>
                        @error('caption') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="file" class="form-control-label">Upload File Berita</label>
                        <input type="file" name="file" value="{{old('file')}}" class="form-control @error('file') is-invalid @enderror "  autofocus required/>
                        @error('file') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
