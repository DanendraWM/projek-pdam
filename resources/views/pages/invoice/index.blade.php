@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                 {{-- <a href="{{ route('invoice.create') }}" class="btn btn-primary mb-3">Buat Invoice</a> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">List Invoice</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        STATUS
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/invoice">ALL</a>
                                        <a class="dropdown-item" href="/invoice?search=draft">DRAFT</a>
                                        <a class="dropdown-item" href="/invoice?search=nota">NOTA</a>
                                        <a class="dropdown-item" href="/invoice?search=selesai">SELESAI</a>
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
                                        <th>Nomer Invoice</th>
                                        <th>Keperluan</th>
                                        <th>Unit Kerja</th>
                                        <th>Uraian</th>
                                        <th>Kode Mata Angsuran</th>
                                        <th>Media Sosial</th>
                                        <th>Total</th>
                                        <th>Update</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($invoice->count())
                                        
                                    @foreach ($invoice as $no => $inv)
                                    <tr>
                                        <td>{{ $no + $invoice->firstItem() }}</td>
                                        <td>{{$inv->kode_invoice}}/ asdjasd</td>
                                        <td>{{$inv->untuk_keperluan}}</td>
                                        <td>{{$inv->unit_kerja}}</td>
                                        <td>{{$inv->uraian}}</td>
                                        <td>{{$inv->kode_mata_angsuran}}</td>
                                        <td>
                                            @foreach ($medsos as $md)
                                            @if ($inv->id == $md->invoice_id)
                                            {{$md->nama_medsos}},
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>Rp.{{$inv->total}}</td>
                                        <td>{{$inv->updated_at}}</td>
                                        <td>{{$inv->status}}</td>
                                        <td>
                                            <a href="{{ route('invoice.show',$inv->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="11" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/invoice" class="text-info"> Lihat semua data</a>
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
