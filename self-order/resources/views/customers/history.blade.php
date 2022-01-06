@extends('layouts.cartMain')

@section('container')
    @if (session('status'))
        <script>
            alert('Pesanan berhasil dibuat silahkan melakukan pembayaran dikasir terdekat');
            // document.location.href = '/dashboard';
        </script>
    @endif
    @if (session('statusedit'))
        <script>
            alert('Pesanan berhasil diedit');
            // document.location.href = '/dashboard';
        </script>
    @endif

    @if (session('kosong'))
        <script>
            alert('Keranjang anda masih kosongS');
            // document.location.href = '/dashboard';
        </script>
    @endif
    <!-- page start-->

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a class="btn btn-primary btn-lg" href="/menu/cart">Back</a>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode</th>
                                                                <th>Tanggal</th>
                                                                <th>Total Harga
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($detail as $trx)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $trx->kode_trx }}</td>
                                                                    <td>{{ $trx->created_at }}</td>
                                                                    <td>Rp
                                                                        {{ number_format($trx->harga_trx, 2, ',', '.') }}
                                                                    </td>
                                                                    <td>{{ $trx->status }}</td>

                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <form action="/history/{{ $trx->kode_trx }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="status"
                                                                                    value="diterima">
                                                                                <button class="btn btn-success"
                                                                                    onclick="return confirm('Pesanan anda telah anda terima?');"><i
                                                                                        class="fas fa-check-double"></i></button>
                                                                            </form>


                                                                            <button type="button" class="btn btn-info"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#lihatDetail-{{ $trx->kode_trx }}"
                                                                                data-bs-whatever="@getbootstrap"><i
                                                                                    class="fas fa-eye"></i></button>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach



                                                        </tbody>
                                                    </table>
                                                </div>
                        </section>
                    </div>
                </div>





                @foreach ($detail as $trx)
                    <div class="modal" id="lihatDetail-{{ $trx->kode_trx }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title centered" id="exampleModalLabel">
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        NOTA </h2>
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
            </section>
        </div>
    </div>
    <!-- page end-->

@endsection
