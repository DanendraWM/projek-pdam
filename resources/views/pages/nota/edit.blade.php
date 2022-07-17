@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Edit Nota
            </strong>
            <div class="card-body card-block">
                <form action="#" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                     <div class="form-group">
                        <label for="tanggal" class="form-control-label">Tanggal Nota</label>
                           <input type="date" name = "tanggal_nota" class="form-control datepicker @error('tanggal_nota') is-invalid @enderror" autofocus required>
                        @error('tanggal_nota') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="perihal" class="form-control-label">Perihal</label>
                        <input type="text" name="perihal" value="{{old('perihal')}}" class="form-control @error('perihal') is-invalid @enderror "  autofocus required/>
                        @error('perihal') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kegiatan" class="form-control-label">Kegiatan</label>
                        <input type="text" name="kegiatan" value="{{old('kegiatan')}}" class="form-control @error('kegiatan') is-invalid @enderror "  autofocus required/>
                        @error('kegiatan') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="biaya" class="form-control-label">Biaya</label>
                        <input type="number" name="biaya" value="{{old('biaya')}}" class="form-control @error('biaya') is-invalid @enderror "  autofocus required/>
                        @error('biaya') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ubah Nota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

