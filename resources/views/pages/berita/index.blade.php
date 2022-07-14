@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">List Berita</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        STATUS
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/berita">ALL</a>
                                        <a class="dropdown-item" href="/berita?search=draft">DRAFT</a>
                                        <a class="dropdown-item" href="/berita?search=revisi">REVISI</a>
                                        <a class="dropdown-item" href="/berita?search=terima">TERIMA</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                            <form action="{{ route('berita.index') }}">
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
                                        <th>Judul</th>
                                        <th>Caption</th>
                                        <th>file</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($berita->count())
                                        @foreach ($berita as $no => $brt)
                                            <tr>
                                                <td>{{ $no + $berita->firstItem() }}</td>
                                                <td>{{ $brt->judul }}</td>
                                                <td>{{ $brt->caption }}</td>
                                                <td><a class="link-berita"  target="_blank"
                                                        href="{{ asset('/file_berita/' . $brt->file) }}">{{$brt->file}}</a></td>
                                                <td>{{ $brt->status }}</td>
                                                <td>
                                                    {{-- <td><a href="/berita/edit/{{$brt->id}}">edit</a> | <a href="/berita/delete/{{$brt->id}}" onclick="return confirm('Yakin ingin hapus ? ')">delete</a> |
                                                @if (auth()->user()->level === 'admin')
                                                    <a href="/confirm/admin/{{$brt->id}}">confirm</a>
                                                @endif
                                            </td> --}}
                                                    <a href="/berita/detail/{{ $brt->id }}"
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
                                                <a href="/berita" class="text-info"> Lihat semua data</a>
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
