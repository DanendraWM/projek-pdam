@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card card-detail-berita">
                    <div class="card-body">
                        <div class=" mx-2">
                            <div class="col-lg-12 col-sm-12 mt-2 ">
                                <h2 class="head-detail">Detail User</h2>
                            </div>
                            <hr class="mb-4">
                            <div class="col d-flex mb-5">

                                <a href="#" class="btn-edit-berita btn btn-primary mr-3 shadow-sm">Edit</a>
                                <button type="button" class="btn btn-danger">
                                <i class="fa fa-trash mr-2"></i>Hapus
                                </button>


                           </div>

                            <div class="card-body">
                                <div>
                                    <h6 class="mb-5"><span class="field-berita" >Nama  </span> <br> Danendra</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Email  </span>   <br>danendra@gmail.com</h6>
                                    <h6  class="mb-5"><span class="field-berita" >Level  </span> <br>super admin</h6>
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
            </div>
        @endsection


