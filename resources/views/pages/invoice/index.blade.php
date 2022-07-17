@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
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
                                        <a class="dropdown-item" href="/invoice?search=revisi">REVISI</a>
                                        <a class="dropdown-item" href="/invoice?search=terima">SELESAI</a>
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
                                    <tr>
                                        <td>1</td>
                                        <td>2837/ asdjasd</td>
                                        <td>banyak keperluan</td>
                                        <td>persatuan pdam</td>
                                        <td>iklan</td>
                                        <td>12312312</td>
                                        <td>facebook, twitter</td>
                                        <td>Rp.12312312</td>
                                        <td>2222-23-23</td>
                                        <td>DRAFT</td>
                                        <td>
                                            <a href="invoice/show"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>

                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/invoice" class="text-info"> Lihat semua data</a>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
