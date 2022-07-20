@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card card-detail-berita">
                    <div class="card-body">
                        <div class=" mx-2">
                            <div class="col-lg-12 col-sm-12 mt-2 ">
                                <h2 class="head-detail">Detail Berita</h2>
                            </div>
                            <hr class="mb-4">
                              @if ($berita->status !== 'TERIMA')
                            <div class="col d-flex mb-5">

                                <a href="{{route('berita.edit', $berita->id)}}" class="btn-edit-berita btn btn-primary mr-3 shadow-sm">Edit</a>
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
                                        <form action="{{route('berita.destroy', $berita->id)}}" method="POST" class="d-inline">
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
                                @endif

                            <div class="card-body">
                                <div>
                                    <h6 class="mb-5"><span class="field-berita" >JUDUL BERITA  </span> <br>  {{ $berita->judul }}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >deskripsi  </span>   <br>{{ $berita->deskripsi }}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >file </span>
                                    <br> <a class="link-berita"  target="_blank"
                                                        href="{{ asset('/file_berita/' . $berita->file) }}">{{$berita->file}}</a></h6>
                                    <h6  class="mb-5"><span class="field-berita" >Status  </span>
                                    <br>{{ $berita->status }}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Nama Media  </span>   <br>{{ $berita->nama_media }}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Update </span>   <br>{{ $berita->updated_at }}</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Status  </span><br>{{ $berita->status }}</h6>

                                    @if ($berita->status === 'REVISI')
                                        <p class="mb-5"><span class="field-berita text-danger" >Alasan Revisi* </span> <br> {{$berita->alasan}} </p>
                                    @endif

                                </div>
                                @auth
                                    @if (auth()->user()->level === 'admin' &&  $berita->status === 'DRAFT')
                                        <div class="row mb-2">
                                          <div class="col-lg-12">
                                        <button type="button" class="btn btn-success btn-block mb-2" data-toggle="modal" data-target="#terimaModal">
                                            <i class="fa fa-check mr-2"></i>Terima
                                            </button>
                                            <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="terimaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header modal-title-terima ">
                                                    <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda Yakin ?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="{{route('berita.status', $berita->id)}}?status=TERIMA" class=" btn btn-success">
                                                    <i class="fa fa-check"></i> TERIMA
                                                </a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                                <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#revisiModal">
                                                <i class="fa fa-times"></i>REVISI
                                                </button>
                                                <div class="modal fade" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="revisiModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Alasan Revisi</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/berita/revisi/{{$berita->id}}" method="post">
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
                                    @endif
                                @endauth
                                @auth
                                      @if (auth()->user()->level === 'admin' &&  $berita->status === 'TERIMA')
                                     <a href="/invoice/create/{{$berita->id}}" class=" btn btn-danger btn-block mb-2">
                                     <i class="fa fa-pencil mr-2"></i> MAKE INVOICE
                                     </a>
                                      @endif
                                @endauth
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


