@extends('layouts.adminMain')

@section('container')

    <!-- page start-->

    <div class="row">

        <div class="col-lg-12">
            <section class="panel">
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <section id="main-content">

                                <form role="form" action="/menu" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="namamenu">Nama Menu</label>
                                        <input type="text" name="nama_menu" class="form-control" id="namamenu"
                                            placeholder="Masukkan nama menu" value="{{ old('nama_menu') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Jenis</label>
                                        <select id="type" class="form-control" name="type"
                                            placeholder="Masukkan jenis menu" value="{{ old('type') }}">
                                            <option>makanan</option>
                                            <option>minuman</option>
                                            <option>dessert</option>

                                        </select>
                                        <!-- <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" placeholder="Jenis"> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Deskripsi</label>
                                        <input type="text" name="desc" class="form-control" id="desc"
                                            placeholder="Masukkan deskripsi menu" value="{{ old('desc') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" name="price" class="form-control" id="price"
                                            placeholder="Masukkan harga menu" value="{{ old('price') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pic">Unggah Foto</label>
                                        <input type="file" name="pic" id="pic" value="{{ old('pic') }}"
                                            class="form-contorl  @error('pic') is-invalid @enderror">
                                        @error('pic')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                                </form>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@endsection
