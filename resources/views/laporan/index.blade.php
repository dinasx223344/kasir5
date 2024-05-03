@extends('template/layout')

@push('style')
@endpush

@section('content')
<section class="content">
    <div class="right_col" role="main">
        <!-- /top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="dashboard_graph">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>
                                    PROJECT UJIKOM
                                </h3>
                            </div>
                            <div class="col-md-6 text-center"> <!-- Tanggal di tengah -->
                                <div id="reportrange" style="
                                        background: #fff;
                                        cursor: pointer;
                                        padding: 5px 10px;
                                        border: 1px solid #ccc;
                                        display: inline-block;
                                    ">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_title">
                        <div class="row align-items-center">
                            <div class="col-md-12"> <!-- Bagian kanan -->
                                <div class="text-center"> <!-- Tambah float-center -->
                                    <h3>Laporan</h3>
                                </div>
                            </div>
                            <div class="col-md-3"> <!-- Bagian kanan -->
                                <div class="input-group">
                                    <div class="float-right ml-right">
                                        <a href="{{ route('export-laporan')}}" class="btn btn-success">
                                            <i class="fa fa-file-excel"></i> Export
                                        </a>
                                        <a href="{{ route('export-laporan-pdf')}}" class="btn btn-danger ml-2">
                                            <i class="fa fa-file-pdf"></i> Export PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-3">
                            @include('laporan.data')
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </div>
        <br />
    </div>
</section>
@endsection


@push('script')
<script>
    $('#tbl-laporan').DataTable()
</script>
@endpush