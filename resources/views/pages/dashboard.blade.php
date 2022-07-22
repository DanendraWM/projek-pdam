@extends('layouts.default')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a  href="{{route('berita.index')}}">
                    <div class="card card-dashboard">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-news-paper"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"> <span class="count">{{ $berita->count() }}</span></div>
                                    <div class="stat-heading">Berita</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="card card-dashboard">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$invoice->count()}}</span></div>
                                    <div class="stat-heading">INVOICE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="card card-dashboard">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$nota->count()}}</span></div>
                                    <div class="stat-heading">NOTA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="card card-dashboard">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">100</span></div>
                                    <div class="stat-heading">VOUCER</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <!-- /Widgets -->
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="row">

            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-header p-3">
                                <h4>STATUS BERITA</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div id="flotPie1" class="float-chart"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-header p-3">
                                <h4>STATUS INVOICE</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div id="flotPie2" class="float-chart"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-header p-3">
                                <h4>STATUS NOTA</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div id="flotPie3" class="float-chart"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div> <!-- /.col-md-4 -->
        </div>
        <!-- /.orders -->
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
@endsection


@push('after-script')
     <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "DRAFT", data: [[1,32]], color: '#5c6bc0'},
                { label: "REVISI", data: [[1,33]], color: '#ef5350'},
                { label: "TERIMA -", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });

             var piedata2 = [
                { label: "DRAFT", data: [[1,32]], color: '#5c6bc0'},
                { label: "REVISI", data: [[1,33]], color: '#ef5350'},
                { label: "TERIMA -", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie2', piedata2, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
             var piedata3 = [
                { label: "DRAFT", data: [[1,32]], color: '#5c6bc0'},
                { label: "REVISI", data: [[1,33]], color: '#ef5350'},
                { label: "TERIMA -", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie3', piedata3, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // Bar Chart #flotBarChart End
        });
    </script>
@endpush
