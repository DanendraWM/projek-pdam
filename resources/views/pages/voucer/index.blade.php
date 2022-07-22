@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">List voucer</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari" name="search"
                                            value="{{ request('search') }}">
                                        <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table  ov-h">
                            <table class="table">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>nomer nota</th>
                                        <th>nomer invoice</th>
                                        <th>perihal</th>
                                        <th>nama berita</th>
                                        <th>file</th>
                                        <th>Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($voucer->count())
                                        @foreach ($voucer as $no => $vc)
                                            <tr>
                                                <td>{{ 1 }}</td>
                                                <td>{{ $vc->nota->kode_nota }}/ asdjasd</td>
                                                <td>{{ $vc->invoice->kode_invoice }}/ asdjasd</td>
                                                <td>{{ $vc->nota->perihal }}</td>
                                                <td>{{ $vc->berita->judul }}</td>
                                                <td><a class="link-berita" target="_blank"
                                                        href="{{ asset('file_voucer' . $vc->voucer) }}">{{ $vc->voucher }}</a>
                                                </td>
                                                <td>{{ $vc->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('voucer.show', $vc->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/voucer" class="text-info"> Lihat semua data</a>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
