@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Buat User</a>
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">LIST USER</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        LEVEL ADMIN
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/berita">KASUBID</a>
                                        <a class="dropdown-item" href="/berita?search=draft">KABID</a>
                                        <a class="dropdown-item" href="/berita?search=revisi">KASAT</a>
                                        <a class="dropdown-item" href="/berita?search=terima">DIREKTUR UMUM</a>
                                        <a class="dropdown-item" href="/berita?search=terima">DIREKTUR UTAMA</a>
                                        <a class="dropdown-item" href="/berita?search=terima">KEUANGAN</a>
                                    </div>
                                </div>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($berita->count())
                                        @foreach ($berita as $no => $brt) --}}
                                            <tr>
                                                <td>1</td>
                                                <td>danendra</td>
                                                <td>danendra@gmail.com</td>
                                                <td>super admin</td>
                                                <td>
                                                    {{-- <td><a href="/berita/edit/{{$brt->id}}">edit</a> | <a href="/berita/delete/{{$brt->id}}" onclick="return confirm('Yakin ingin hapus ? ')">delete</a> |
                                                @if (auth()->user()->level === 'admin')
                                                    <a href="/confirm/admin/{{$brt->id}}">confirm</a>
                                                @endif
                                            </td> --}}
                                                    <a href="{{route('user.detail')}}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        {{-- @endforeach
                                    @else --}}
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/user" class="text-info"> Lihat semua data</a>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
