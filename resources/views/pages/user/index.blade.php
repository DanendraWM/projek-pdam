@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Buat User</a>
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">LIST USER</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-user dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        LEVEL ADMIN
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/user?search=kasubid">KASUBID</a>
                                        <a class="dropdown-item" href="/user?search=kabid">KABID</a>
                                        <a class="dropdown-item" href="/user?search=kasat">KASAT</a>
                                        <a class="dropdown-item" href="/user?search=direktur+umum">DIREKTUR UMUM</a>
                                        <a class="dropdown-item" href="/user?search=direktur+utama">DIREKTUR UTAMA</a>
                                        <a class="dropdown-item" href="/user?search=keuangan">KEUANGAN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <form action="{{ route('user.index') }}">
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
                                    @if ($user->count())
                                        @foreach ($user as $no => $usr)
                                            <tr>
                                                <td>{{ $no + $user->firstItem() }}</td>
                                                <td>{{ $usr->name }}</td>
                                                <td>{{ $usr->email }}</td>
                                                <td>{{ $usr->level }}</td>
                                                <td>
                                                    <a href="{{ route('user.show', $usr->id) }}"
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
                                                <a href="/user" class="text-info"> Lihat semua data</a>
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
