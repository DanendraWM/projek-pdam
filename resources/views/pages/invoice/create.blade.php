
@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Tambah Invoice
            </strong>
            <div class="card-body card-block">
                <form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_berita" value="{{$berita->id}}" hidden>
                    <div class="form-group">
                        <label for="untuk_keperluan" class="form-control-label">Keperluan</label>
                           <input type="text" name = "untuk_keperluan" class="form-control @error('untuk_keperluan') is-invalid @enderror" autofocus required>
                        @error('untuk_keperluan') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                     <div class="form-group">
                        <label for="unit_kerja" class="form-control-label">Unit Kerja</label>
                        <input type="text" name="unit_kerja" value="{{old('unit_kerja')}}" class="form-control @error('unit_kerja') is-invalid @enderror "  autofocus required/>
                        @error('unit_kerja') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="uraian" class="form-control-label">Uraian</label>
                        <input type="text" name="uraian" value="{{old('uraian')}}" class="form-control @error('uraian') is-invalid @enderror "  autofocus required/>
                        @error('uraian') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_mata_angsuran" class="form-control-label">Kode Mata Angsuran</label>
                        <input type="number" name="kode_mata_angsuran" value="{{old('kode_mata_angsuran')}}" class="form-control @error('kode_mata_angsuran') is-invalid @enderror "  autofocus required/>
                        @error('kode_mata_angsuran') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_angsuran" class="form-control-label">Jumlah Angsuran</label>
                        <input type="number" name="jumlah_angsuran" value="{{old('jumlah_angsuran')}}" class="form-control @error('jumlah_angsuran') is-invalid @enderror "  autofocus required/>
                        @error('jumlah_angsuran') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="realisasi" class="form-control-label">Realisasi</label>
                        <input type="number" name="realisasi" value="{{old('realisasi')}}" class="form-control @error('realisasi') is-invalid @enderror "  autofocus required/>
                        @error('realisasi') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sisa_anggaran" class="form-control-label">Sisa Anggaran</label>
                        <input type="number" name="sisa_anggaran" value="{{old('sisa_anggaran')}}" class="form-control @error('sisa_anggaran') is-invalid @enderror "  autofocus required/>
                        @error('sisa_anggaran') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="permintaan" class="form-control-label">Permintaan Sekarang</label>
                        <input type="number" name="permintaan" value="{{old('permintaan')}}" class="form-control @error('permintaan') is-invalid @enderror "  autofocus required/>
                        @error('permintaan') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="medsos" class="form-control-label">Media Sosial</label>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Facebook" id="Facebook">
                        <label class="form-check-label" for="Facebook">
                            Facebook
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Twitter" id="Twitter">
                        <label class="form-check-label" for="Twitter">
                            Twitter
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Instagram" id="Instagram">
                        <label class="form-check-label" for="Instagram">
                            Instagram
                        </label>
                        </div>
                         <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Youtube" id="Youtube">
                        <label class="form-check-label" for="Youtube">
                            Youtube
                        </label>
                        </div>
                         <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Telegram" id="Telegram">
                        <label class="form-check-label" for="Telegram">
                            Telegram
                        </label>
                        </div>
                         <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="online" id="online">
                        <label class="form-check-label" for="online">
                            online
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Media_analytic" id="Media_analytic">
                        <label class="form-check-label" for="Media_analytic">
                            Media analytic
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="Cetak" id="Cetak">
                        <label class="form-check-label" for="Cetak">
                            Cetak
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" name="medsos[]" type="checkbox" value="WhatsApp_group" id="WhatsApp_group">
                        <label class="form-check-label" for="WhatsApp_group">
                            WhatsApp group
                        </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-control-label">Total</label>
                        <input type="number" name="total" value="{{old('total')}}" class="form-control @error('total') is-invalid @enderror "  autofocus required/>
                        @error('total') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Invoice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
