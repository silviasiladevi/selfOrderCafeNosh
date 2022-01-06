@extends('layouts.adminMain')

@section('container')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold ">Daftar Transaksi</h6>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th data-orderable="false">No</th>
                                <th>Nama user</th>
                                <th>Kode</thid=>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>Status</thid=>
                                    @can('kasir')
                                    <th>Update status</th>
                                @endcan
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($detail as $trx)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $trx->user->fullname }}</td>
                                    <td>{{ $trx->kode_trx }}</td>
                                    <td>{{ $trx->created_at }}</td>
                                    <td>Rp
                                        {{ number_format($notas->where('kode_trx', $trx->kode_trx)->sum('total_harga'), 2, ',', '.') }}
                                    </td>
                                    <td>{{ $trx->status }}</td>
                                    @can('kasir')


                                        <td>
                                            <div class="btn-group">
                                                <form action="keloladaftar/{{ $trx->kode_trx }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="diproses">
                                                    <button class="btn btn-info"
                                                        onclick="return confirm('Transaksi ini akan diproses ?');"><i
                                                            class="fas fa-hourglass-start"></i></button>
                                                </form>
                                                <form action="keloladaftar/{{ $trx->kode_trx }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="selesai">
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Transaksi ini telah selesai?');"><i
                                                            class="fas fa-check-double"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    @endcan
                                    <td>
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#lihatDetail-{{ $trx->kode_trx }}"
                                                data-bs-whatever="@getbootstrap"><i class="fas fa-eye"></i></button>

                                            @can('kasir')

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updatePembayaran-{{ $trx->kode_trx }}"
                                                    data-bs-whatever="@getbootstrap"><i
                                                        class="fas fa-cash-register"></i></button>
                                            @endcan
                                            @can('admin')
                                                <form action="keloladaftar/{{ $trx->kode_trx }}" method="post">
                                                    @method('delete')
                                                    @csrf <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Transaksi ini akan dihapus?');">
                                                        <i class="fas fa-trash"></i></button>
                                                </form>

                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total Pemasukan :</td>
                                <td> Rp
                                    {{ number_format($trx->where('status', '!=', 'menunggu pembayaran')->sum('harga_trx'), 2, ',', '.') }}
                                </td>
                                <td></td>
                                @can('kasir')
                                    <td></td>
                                @endcan

                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    @foreach ($detail as $trx)
        <div class="modal" id="updatePembayaran-{{ $trx->kode_trx }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title centered" id="exampleModalLabel">
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            UPDATE </h2>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $trx->kode_trx }}</h5>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Qty</th>
                                    <th>Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas->where('kode_trx', $trx->kode_trx) as $nota)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nota->menu->nama_menu }}</td>
                                        <td>{{ $nota->jml_beli }} </td>
                                        <td>Rp {{ number_format($nota->total_harga, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <h6>Total Harga : Rp
                            {{ number_format($trx->harga_trx, 2, ',', '.') }}
                            </td>
                        </h6>
                        </br>

                        <form action="/homeAdmin/keloladaftar/bayar/{{ $trx->kode_trx }}" method="post">
                            @csrf
                            <div class="kasir">
                                <input type="hidden" name="total_harga" id="total" class="total"
                                    data-price="{{ $trx->harga_trx }}" value="{{ $trx->harga_trx }}">
                                <h6>Total bayar&nbsp;
                                    <input type="number" id="bayar" name="total_bayar" step="100" min="0"
                                        value="{{ $trx->total_bayar }}" class="form-control" required>

                                </h6>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($detail as $trx)
        <div class="modal" id="lihatDetail-{{ $trx->kode_trx }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title centered" id="exampleModalLabel">
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            DETAIl TRANSAKSI </h2>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $trx->kode_trx }}</h5>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Qty</th>
                                    <th>Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas->where('kode_trx', $trx->kode_trx) as $nota)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nota->menu->nama_menu }}</td>
                                        <td>{{ $nota->jml_beli }} </td>
                                        <td>Rp {{ number_format($nota->total_harga, 2, ',', '.') }}</td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <h6>Total Harga :
                            Rp
                            {{ number_format($trx->harga_trx, 2, ',', '.') }}
                            </td>
                            </br></br>
                            Total bayar&nbsp; :
                            Rp {{ number_format($trx->total_bayar, 2, ',', '.') }}</td>
                            </br></br>
                            Kembali &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:
                            Rp {{ number_format($trx->kembalian, 2, ',', '.') }}</td>
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End of Main Content -->

    <!-- Footer -->


@endsection
