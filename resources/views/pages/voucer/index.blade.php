@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-lg-4 col-sm-12">
                                <h3 class="font-weight-bold">List voucer</h3>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="dropdown">
                                    <a class="btn dropdown-status-berita dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        STATUS
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/voucer">ALL</a>
                                        <a class="dropdown-item" href="/voucer?search=draft">DRAFT</a>
                                        <a class="dropdown-item" href="/voucer?search=revisi">REVISI</a>
                                        <a class="dropdown-item" href="/voucer?search=terima">SELESAI</a>
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
                                        <th>nomer nota</th>
                                        <th>file</th>
                                        <th>Update</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2837/ asdjasd</td>
                                         <td><a class="link-berita" target="_blank" href="#">asojdnasjdnas.pdf</a></td>
                                        <td>2222-23-23</td>
                                        <td>DRAFT</td>
                                        <td>
                                            <a href="voucer/show"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>

                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                                <a href="/voucer" class="text-info"> Lihat semua data</a>
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
