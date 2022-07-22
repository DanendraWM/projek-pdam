@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">List Nota</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        STATUS
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/nota">ALL</a>
                                        <a class="dropdown-item" href="/nota?search=draft">DRAFT</a>
                                        <a class="dropdown-item" href="/nota?search=revisi">REVISI</a>
                                        <a class="dropdown-item" href="/nota?search=terima">SELESAI</a>
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
                                        <th>nomor invoice</th>
                                        <th>nomor nota</th>
                                        <th>Tanggal Nota</th>
                                        <th>perihal</th>
                                        <th>Kegiatan</th>
                                        <th>Biaya</th>
                                        <th>Update</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @auth
                                @if ($nota->count())                                    
                                    @foreach ($nota as $no=>$drm)
                                    <tr>
                                        <td>{{ $no + $nota->firstItem() }}</td>
                                        <td>{{$drm->invoice->kode_invoice}}/ asdjasd</td>
                                        <td>{{$drm->kode_nota}}/ asdjasd</td>
                                        <td>{{$drm->tanggal_nota}}</td>
                                        <td>{{$drm->perihal}}</td>
                                        <td>{{$drm->kegiatan}}</td>
                                        <td>{{$drm->biaya}}</td>
                                        <td>{{$drm->updated_at}}</td>
                                        <td>{{$drm->status}}</td>
                                        <td>
                                            <a href="{{route('nota.show',$drm->id)}}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- @elseif(auth()->user()->level==="dirut")
                                     @foreach ($dirut as $no=>$drt)
                                    <tr>
                                        <td>{{ $no + $nota->firstItem() }}</td>
                                        <td>{{$drt->invoice->kode_invoice}}/ asdjasd</td>
                                        <td>{{$drt->kode_nota}}/ asdjasd</td>
                                        <td>{{$drt->tanggal_nota}}</td>
                                        <td>{{$drt->perihal}}</td>
                                        <td>{{$drt->kegiatan}}</td>
                                        <td>{{$drt->biaya}}</td>
                                        <td>{{$drt->updated_at}}</td>
                                        <td>{{$drt->status}}</td>
                                        <td>
                                            <a href="{{route('nota.show',$drt->id)}}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @elseif(auth()->user()->level==="admin")
                                     @foreach ($nota as $no=>$drt)
                                    <tr>
                                        <td>{{ $no + $nota->firstItem() }}</td>
                                        <td>{{$drt->invoice->kode_invoice}}/ asdjasd</td>
                                        <td>{{$drt->kode_nota}}/ asdjasd</td>
                                        <td>{{$drt->tanggal_nota}}</td>
                                        <td>{{$drt->perihal}}</td>
                                        <td>{{$drt->kegiatan}}</td>
                                        <td>{{$drt->biaya}}</td>
                                        <td>{{$drt->updated_at}}</td>
                                        <td>{{$drt->status}}</td>
                                        <td>
                                            <a href="{{route('nota.show',$drt->id)}}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach --}}
                                @else
                                        <tr>
                                            <td colspan="10" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/nota" class="text-info"> Lihat semua data</a>
                                            </td>
                                        </tr>
                                @endif
                                @endauth
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
