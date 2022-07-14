@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" mx-2">
                            <a href="/berita" class="btn btn-secondary btn-sm">Kembali</a>
                            <div class="col-lg-8 col-sm-6 mt-2">
                                <h4 class="box-title">Detail Berita</h4>
                            </div>

                            <div class="card-body">
                                <div>
                                    <p>Judul Berita : {{ $berita->judul }}</p>
                                </div>
                                @auth
                                    @if (auth()->user()->level === 'admin')
                                        <div class="col-lg-3 col-sm-6 d-flex">
                                            <form action="/berita/detail/{{ $berita->id }}" method="post">
                                                @csrf
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="confirm" id="terima"
                                                        value="terima">
                                                    <label class="form-check-label" for="terima">
                                                        terima
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="confirm" id="revisi"
                                                        value="revisi">
                                                    <label class="form-check-label" for="revisi">
                                                        revisi
                                                    </label>
                                                </div>
                                                <button class="btn btn-sm btn-primary" type="submit">Confirm</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
