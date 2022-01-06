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
            alert('Keranjang anda masih kosong ..');
            // document.location.href = '/dashboard';
        </script>
    @endif
    <!-- page start-->

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">

                <a class="btn btn-primary btn-lg" href="/history">History</a>
                <div class="table-responsive">


                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Produk</th>
                                <th>Nama Menu</th>
                                <th>Jumlah_beli</th>
                                <th>total_Harga</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td><img width="150px" src="{{ Storage::url($cart->menu->pic) }}"></td>
                                    <td>{{ $cart->menu->nama_menu }}</td>
                                    <td>
                                        <form role="form" action="/cart/{{ $cart->id }}/update" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cart->id }}">
                                            {{-- <input type="hidden" name="menu_id" value="{{ $cart->menu_id }}">
                                        <input type="hidden" name="user_id" value="{{ $cart->user_id }}"> --}}
                                            <input type="hidden" name="price" value="{{ $cart->menu->price }}">



                                            <input type="number" name="jml_beli" id="jml_beli"
                                                placeholder="{{ $cart->jml_beli }}" max="10000" min="1"
                                                value="{{ $cart->jml_beli }}" class="form-control" required>
                                            {{-- <input type="hidden" name="user_id" value="{{ $cart->user_id }}"> --}}
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </td>
                                    <td>Rp {{ number_format($cart->total_harga, 2, ',', '.') }} </td>
                                    <td>
                                        <form action="{{ $cart->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Data ini akan dihapus');"><i
                                                        class="fas fa-trash"></i></button>

                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total Bayar : Rp {{ number_format($carts->sum('total_harga'), 2, ',', '.') }}</td>
                                <td></td>
                                <td>
                                    <form action="/menu/cart/checkout" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <button class="btn btn-primary btn-lg" type="submit"
                                            onclick="return confirm('Pesanan Akan dibuat');">Checkout</button>
                                </td>
                                </form>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- page end-->
@endsection
