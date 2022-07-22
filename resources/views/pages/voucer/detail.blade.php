@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card card-detail-berita">
                    <div class="card-body">
                        <div class=" mx-2">
                            <div class="col-lg-12 col-sm-12 mt-2 ">
                                <h2 class="head-detail">Detail voucer</h2>
                            </div>
                            <hr class="mb-4">
                            {{-- <div class="col d-flex mb-5">

                                <a href="voucer/edit" class="btn-edit-berita btn btn-primary mr-3 shadow-sm">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                                    <i class="fa fa-trash mr-2"></i>Hapus
                                </button>
                                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header modal-title-hapus ">
                                                <h4 class="modal-title mt-3" id="exampleModalLabel">Apakah Anda Yakin ?</h4>
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


                            </div> --}}

                            <div class="card-body">
                                <div>
                                    <h6 class="mb-5"><span class="field-berita">Kode nota </span> <br>
                                        {{ $voucer->nota->kode_nota }}/pdam</h6>
                                    <h6 class="mb-5"><span class="field-berita">file </span>
                                        <br> <a class="link-berita" target="_blank"
                                            href="{{ asset('file_voucer/' . $voucer->voucher) }}">{{ $voucer->voucher }}</a>
                                    </h6>
                                    <h6 class="mb-5"><span class="field-berita">Update
                                        </span><br>{{ $voucer->updated_at }}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="/berita" class="btn btn-secondary btn-block">Kembali</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endsection
