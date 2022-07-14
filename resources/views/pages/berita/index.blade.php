@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-8 col-sm-6">
                                <h4 class="box-title">List Berita</h4>
                            </div>
                            <div class="col-lg-3 col-sm-6 ml-auto">
                                <h4 class="box-title">Status</h4>
                                <div class="dropdown show">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Draft
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/berita?search=draft">Draft</a>
                                        <a class="dropdown-item" href="/berita?search=revisi">Revisi</a>
                                        <a class="dropdown-item" href="/berita?search=terima">Terima</a>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('berita.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...." name="search"
                                        value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
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
                                                <td><a class="btn btn-primary"
                                                        href="{{ asset('/file_berita/' . $brt->file) }}">berita</a></td>
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
                                                    <form action="#" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
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
