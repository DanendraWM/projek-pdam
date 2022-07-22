@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card card-detail-berita">
                    <div class="card-body">
                        <div class=" mx-2">
                            <div class="col-lg-12 col-sm-12 mt-2 ">
                                <h2 class="head-detail">Detail Invoice</h2>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-lg-8 mb-5">

                                    <div class="d-flex">
                                        <a href="{{ route('invoice.edit', $invoice->id) }}"
                                            class="btn-edit-berita btn btn-primary mr-3 shadow-sm">Edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapusModal">
                                            <i class="fa fa-trash mr-2"></i>Hapus
                                        </button>
                                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                                            aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-title-hapus ">
                                                        <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda
                                                            Yakin ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="#" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')

                                                            <button class="btn btn-danger">
                                                                <i class="fa fa-trash mr-2"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                @if ($invoice->status == 'DRAFT')
                                    <div class="col-lg-4">
                                        <div class="d-fex align-items-end ">
                                            <button type="button" class="mb-2 btn-edit-berita btn btn-info mr-3 shadow-sm"
                                                data-toggle="modal" data-target="#uangMukaModal">
                                                <i class="fa fa-check mr-2"></i>Uang Muka
                                            </button>
                                            <div class="modal fade" id="uangMukaModal" tabindex="-1" role="dialog"
                                                aria-labelledby="uangMukaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-title-uangMuka ">
                                                            <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda
                                                                Yakin ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <a href="{{ route('invoice.status', $invoice->id) }}?status=NOTA&metode_pembayaran=uang+muka"
                                                                class=" btn btn-info mr-3 shadow-sm"><i
                                                                    class="fa fa-check mr-2"></i>Uang Muka</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button"
                                                class="mb-2 btn-edit-berita btn btn-outline-success mr-3 shadow-sm"
                                                data-toggle="modal" data-target="#danaKerjaModal">
                                                <i class="fa fa-check mr-2"></i>Dana Kerja
                                            </button>
                                            <div class="modal fade" id="danaKerjaModal" tabindex="-1" role="dialog"
                                                aria-labelledby="danaKerjaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-title-danaKerja ">
                                                            <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda
                                                                Yakin ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <a href="{{ route('invoice.status', $invoice->id) }}?status=SELESAI&metode_pembayaran=dana+kerja"
                                                                class=" btn btn-outline-success mr-3 shadow-sm"><i
                                                                    class="fa fa-check mr-2"></i> Dana Kerja</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div>
                                    <h6 class="mb-5"><span class="field-berita">Kode Invoice </span> <br>
                                        {{ $invoice->kode_invoice }}/pdam</h6>
                                    <h6 class="mb-5"><span class="field-berita">Judul Berita </span> <br>
                                        {{ $invoice->berita->judul }}</h6>
                                    <h6 class="mb-5"><span class="field-berita">Keperluan </span>
                                        <br>{{ $invoice->untuk_keperluan }}
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">Unit Kerja </span>
                                        <br>{{ $invoice->unit_kerja }}
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">uraian </span>
                                        <br>{{ $invoice->uraian }}
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">kode mata angsuran </span>
                                        <br>{{ $invoice->kode_mata_angsuran }}
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">jumlah angsuran
                                        </span><br>{{ $invoice->jumlah_angsuran }}</h6>
                                    <h6 class="mb-5"><span class="field-berita">Realisasi
                                        </span><br>{{ $invoice->realisasi }}</h6>
                                    <h6 class="mb-5"><span class="field-berita">Sisa Anggaran
                                        </span><br>{{ $invoice->sisa_anggaran }}</h6>
                                    <h6 class="mb-5"><span class="field-berita">Sosial Media </span><br>
                                        @foreach ($medsos as $md)
                                            {{ $md->nama_medsos }},
                                        @endforeach
                                    </h6>

                                    <h6 class="mb-5"><span class="field-berita">Total
                                        </span><br>{{ $invoice->total }}
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">Status
                                        </span><br>{{ $invoice->status }}</h6>
                                    <h6 class="mb-5"><span class="field-berita">Update
                                        </span><br>{{ $invoice->updated_at }}</h6>
                                </div>
                                @if ($invoice->status == 'NOTA')
                                    <a href="/nota/create/{{$invoice->id}}" class=" btn btn-danger btn-block mb-2">
                                        <i class="fa fa-pencil mr-2"></i> MAKE NOTA
                                    </a>
                                @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="/invoice" class="btn btn-secondary btn-block">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
