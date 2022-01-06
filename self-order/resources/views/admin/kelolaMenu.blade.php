@extends('layouts.adminMain')

@section('container')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary btn-lg" href="/menu/create">Tambah Menu</a>


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
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Gambar Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $menu)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->nama_menu }}</td>
                                    <td>{{ $menu->type }}</td>
                                    <td>{{ $menu->desc }}</td>
                                    <td>Rp {{ number_format($menu->price, 2, ',', '.') }}</td>
                                    <td><img width="150px" src="{{ Storage::url($menu->pic) }}"></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ $menu->id_menu }}/edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ $menu->id_menu }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus menu ini?');"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->


@endsection
