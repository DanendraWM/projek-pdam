@extends('layouts.dafault')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Ubah Barang
            </strong>
            <div class="card-body card-block">
                <form action="{{route('berita.update',$berita->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                   <div class="form-group">
                        <label for="name" class="form-control-label">Judul Berita</label>
                        <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="pencopetan di bus" autofocus required value="{{$berita->judul}}">
                        @error('name') <div class="text-muted">{{$massage}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="caption" class="form-control-label">Caption Berita</label>
                       <input type="text" name="caption" class="form-control" id="caption" placeholder="caption" required value="{{$berita->caption}}">
                        @error('type') <div class="text-muted">{{$massage}}</div> @enderror

                    </div>
                    <div class="form-group">
                        <label for="file" class="form-control-label">Upload File Berita</label>
                        <input type="file" name="file" value="{{old('file')}}" class="form-control @error('file') is-invalid @enderror "/>
                        @error('file') <div class="text-muted">{{$massage}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ubah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

