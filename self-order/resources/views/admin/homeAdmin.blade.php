@extends('layouts.adminMain')

@section('container')

    <!-- page start-->


    <section class="panel">
        <div class="row">
            @can('admin')
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <a class="card-block stretched-link text-decoration-none" href="/homeAdmin/kelolamenu">
                                <div class="row">
                                    <div class="col mr-2">
                                        <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                            KELOLA MENU</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">Tambah,Edit,Hapus Menu</div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <a class="card-block stretched-link text-decoration-none" href="/homeAdmin/kelolauser">
                                <div class="row">
                                    <div class="col mr-2">
                                        <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">
                                            KELOLA USER</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">Lihat, Edit Jabatan,Hapus User</div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <a class="card-block stretched-link text-decoration-none" href="/homeAdmin/keloladaftar">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 font-weight-bold text-warning text-uppercase mb-1">
                                            KELOLA DAFTAR TRANSAKSI</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">Lihat Detail, Hapus Transaksi </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('kasir')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <a class="card-block stretched-link text-decoration-none" href="/homeAdmin/keloladaftar">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 font-weight-bold text-warning text-uppercase mb-1">
                                        KELOLA DAFTAR TRANSAKSI</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Lihat Detail, Update Status, Update
                                        Pembayaran </div>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>

        @endcan

    </section>
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>


    <!-- page end-->
@endsection
