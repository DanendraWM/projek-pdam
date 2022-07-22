@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card card-detail-berita">
                    <div class="card-body">
                        <div class=" mx-2">
                            <div class="col-lg-12 col-sm-12 mt-2 ">
                                <h2 class="head-detail">Detail Nota</h2>
                            </div>
                            <hr class="mb-4">
                            <div class="col d-flex mb-5">

                                <a href="nota/edit" class="btn-edit-berita btn btn-primary mr-3 shadow-sm">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                                <i class="fa fa-trash mr-2"></i>Hapus
                                </button>
                                 <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header modal-title-hapus ">
                                        <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda Yakin ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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

                            <div class="card-body">
                                <div>
                                    <h6 class="mb-5"><span class="field-berita" >Kode nota  </span> <br> {{$nota->kode_nota}}/pdam</h6>
                                    <h6 class="mb-5"><span class="field-berita" >Kode invoice  </span> <br> {{$nota->invoice->kode_invoice}}/pdam</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Tanggal Nota  </span>   <br>{{$nota->tanggal_nota}}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Perihal </span><br>{{$nota->perihal}}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Kegiatan </span>   <br>{{$nota->kegiatan}}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Biaya</span>   <br>{{$nota->biaya}}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Status  </span><br>{{$nota->status}}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Update  </span><br>{{$nota->updated_at}}</h6>
                                </div>
                                        <div class="row mb-2">
                                          <div class="col-lg-12">
                                            @auth
                                            @if (auth()->user()->level==="dirum" && $nota->status==="DRAFT")
                                            <button type="button" class="btn btn-success btn-block mb-2" data-toggle="modal" data-target="#terimaDirumModal">
                                            <i class="fa fa-check mr-2"></i>Terima Direktur Umum
                                            </button>
                                            @endif
                                            @endauth
                                            <div class="modal fade" id="terimaDirumModal" tabindex="-1" role="dialog" aria-labelledby="terimaDirumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header modal-title-terima ">
                                                    <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda Yakin ?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="{{ route('nota.status', $nota->id) }}?status=diterima+direktur+umum" class="btn btn-success">
                                                    <i class="fa fa-check"></i> TERIMA
                                                </a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            @auth
                                            @if (auth()->user()->level==="dirut" && $nota->status==="diterima direktur umum")
                                            <button type="button" class="btn btn-success btn-block mb-2" data-toggle="modal" data-target="#terimaDirutModal">
                                                <i class="fa fa-check mr-2"></i>Terima Direktur Utama
                                            </button>
                                            @endif
                                            @endauth
                                            <div class="modal fade" id="terimaDirutModal" tabindex="-1" role="dialog" aria-labelledby="terimaDirutModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header modal-title-terima ">
                                                    <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda Yakin ?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="{{ route('nota.status', $nota->id) }}?status=diterima+direktur+utama" class=" btn btn-success">
                                                    <i class="fa fa-check"></i> TERIMA
                                                </a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            @auth
                                            @if (auth()->user()->level==="dirum" && $nota->status==="DRAFT" || auth()->user()->level==="dirut" && $nota->status==="diterima direktur umum")
                                            <a href="{{ route('nota.status', $nota->id) }}?status=REVISI" class="btn btn-warning btn-block" data-toggle="modal" data-target="#revisiModal">
                                                <i class="fa fa-times"></i>REVISI
                                            </a>
                                            @endif
                                                                                        @endauth
                                                <div class="modal fade" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="revisiModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Alasan Revisi</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" method="post">
                                                            @csrf
                                                        <div class="form-group">
                                                            <input type="text" name="alasan" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button class=" btn btn-warning">
                                                            <i class="fa fa-times"></i> REVISI
                                                        </button>
                                                    </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>

                                        </div>
                                        </div>
                                    @if ($nota->status==="diterima direktur utama")
                                    <a href="/voucer/create/{{$nota->id}}" class=" btn btn-danger btn-block mb-2">
                                        <i class="fa fa-pencil mr-2"></i> MAKE VOUCER
                                    </a>
                                    @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                         <a href="/berita" class="btn btn-secondary btn-block">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection


