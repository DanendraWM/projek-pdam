@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Edit Berita
            </strong>
            <div class="card-body card-block">
                <form action="{{route('berita.update',$berita->id)}}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                   <div class="form-group">
                        <label for="name" class="form-control-label">Judul Berita</label>
                        <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="pencopetan di bus" autofocus required value="{{$berita->judul}}">
                        @error('name') <div class="text-muted">{{$massage}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="deskripsi" class="form-control-label">deskripsi Berita</label>
                       <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="deskripsi" required value="{{$berita->deskripsi}}">
                        @error('deskripsi') <div class="text-muted">{{$massage}}</div> @enderror

                    </div>
                    <div class="form-group">
                        <label for="file" class="form-control-label">Upload File Berita</label>
                        <input type="file" name="file" value="{{$berita->file}}" class="form-control @error('file') is-invalid @enderror "/>
                        @error('file') <div class="text-muted">{{$massage}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_media" class="form-control-label">Nama Media </label>
                        <input type="text" name="nama_media" value="{{$berita->nama_media}}" class="form-control @error('nama_media') is-invalid @enderror "  autofocus required/>
                        @error('nama_media') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ubah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

