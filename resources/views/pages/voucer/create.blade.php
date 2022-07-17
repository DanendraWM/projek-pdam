
@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Tambah Voucer
            </strong>
            <div class="card-body card-block">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="file" class="form-control-label">Upload Voucer</label>
                        <input type="file" name="file" value="{{old('file')}}" class="form-control @error('file') is-invalid @enderror "  autofocus required/>
                        @error('file') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Voucer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
