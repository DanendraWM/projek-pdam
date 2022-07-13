@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <div class="row ">
                         <div class="col-lg-8 col-sm-6">
                            <h4 class="box-title">Detail Berita</h4>
                        </div>
                        <div class="col-lg-3 col-sm-6 d-flex" >
                        <a href="#" type="button" class="btn btn-primary mr-3"> Edit</a>
                        <a href="#" type="button" class="btn btn-success mr-2"> <i class="fa fa-check mr-2"></i>Konfirmasi</a>
                        <a href="#" type="button" class="btn btn-danger mr-2"> <i class="fa fa-close mr-2"></i>Tolak</a>
                    </div>
                    <div class="card-body--">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
