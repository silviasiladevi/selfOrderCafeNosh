@extends('layouts.main')

@section('container')

    @if (session('status'))
        <script>
            alert('Data berhasil ditambahkan ke keranjang!');
            // document.location.href = '/dashboard';
        </script>
    @endif
    <main>
        <header class="row tm-welcome-section">
            <img src="/img/Nosh/NoshLogo.png" alt="logo" style="height: 200px">

            <h2 class="col-12 text-center tm-section-title">Welcome to Nosh
                @auth
                    {{ auth()->user()->fullname }}</h2>
            @endauth

            <p class="col-12 text-center">You deserve Eat The Best Food <br>Good Food, Good Mood</p>
            </br></br>
            @auth
                </br></br>
                <p class="col-12 text-center">
                    <button type="button" class="btn_style"><a class="btn btn-success" style="color:white"
                            href="/menu/cart"><i class="fas fa-shopping-cart fa-2x"></i></br>Your Cart</a></button>
                </p>
            @endauth

            @guest
                <p class="col-12 text-center">
                    <button type="button" class="btn btn-dark"><a class="btn btn-dark" style="color:rgb(253, 252, 252)"
                            onclick="return confirm('Silahkan lakukan login terlebih dahulu..');"><i
                                class="
                            fas fa-shopping-cart fa-2x"></i></br>Your Cart</a></button>
                </p>
            @endguest
        </header>

        <div class="tm-paging-links">
            <nav>
                <ul>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link active">Foods</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Drinks</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Desserts</a></li>
                </ul>
            </nav>
        </div>
        <!-- gallery -->
        <div class="row tm-gallery">
            <!-- gallery page 1 -->

            <div id="tm-gallery-page-foods" class="card-deck tm-gallery-page">

                @foreach ($foods as $food)
                    <div class="card col-lg-3 col-md-4 col-sm-6 " style="width: 18rem;">
                        <figure class="card-img-top mb-5 rounded p-3 bg-light shadow-sm text-center">
                            <img width="150px" height="150px" src="{{ Storage::url($food->pic) }}" class="image-resize"
                                alt="Image">
                            <div class="card-body">
                                <figcaption class="card-img-bottom p-3">
                                    @auth


                                        <form action="{{ $food->id_menu }}/add" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="menu_id" value="{{ $food->id_menu }}">
                                            <input type="hidden" name="price" value="{{ $food->price }}">
                                            <button type="submit" class="btn_style"
                                                onclick="return confirm('Data ini akan ditambahkan ke keranjang');">
                                                <i class="fas fa-cart-plus"></i></button>
                                        </form>
                                    @endauth
                                    <h3 class="card-title">{{ $food->nama_menu }}</h3>
                                    <p class="card-text">{{ $food->desc }}</p>
                                </figcaption>
                            </div>
                        </figure>
                        <div class="card-footer" style="bottom:5px;">
                            <h4 class="text-muted">Rp {{ number_format($food->price, 2, ',', '.') }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>



            <!-- gallery page 2 -->
            <div id="tm-gallery-page-drinks" class="tm-gallery-page hidden">
                @foreach ($drinks as $drink)
                    <div class="card col-lg-3 col-md-4 col-sm-6 " style="width: 18rem;">
                        <figure class="card-img-top mb-5 rounded p-3 bg-light shadow-sm text-center">
                            <img width="150px" height="150px" src="{{ Storage::url($drink->pic) }}" class="image-resize"
                                alt="Image">
                            <div class="card-body">
                                <figcaption class="card-img-bottom p-3">
                                    @auth


                                        <form action="{{ $drink->id_menu }}/add" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="menu_id" value="{{ $drink->id_menu }}">
                                            <input type="hidden" name="price" value="{{ $drink->price }}">
                                            <button type="submit" class="btn_style"
                                                onclick="return confirm('Data ini akan ditambahkan ke keranjang');">
                                                <i class="fas fa-cart-plus"></i></button>
                                        </form>
                                    @endauth
                                    <h3 class="card-title">{{ $drink->nama_menu }}</h3>
                                    <p class="card-text">{{ $drink->desc }}</p>
                                </figcaption>
                            </div>
                        </figure>
                        <div class="card-footer" style="bottom:5px;">
                            <h4 class="text-muted">Rp {{ number_format($drink->price, 2, ',', '.') }}</h4>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- gallery page 3 -->
            <div id="tm-gallery-page-desserts" class="tm-gallery-page hidden">
                @foreach ($desserts as $dessert)
                    <div class="card col-lg-3 col-md-4 col-sm-6 " style="width: 18rem;">
                        <figure class="card-img-top mb-5 rounded p-3 bg-light shadow-sm text-center">
                            <img width="150px" height="150px" src="{{ Storage::url($dessert->pic) }}"
                                class="image-resize" alt="Image">
                            <div class="card-body">
                                <figcaption class="card-img-bottom p-3">
                                    @auth


                                        <form action="{{ $dessert->id_menu }}/add" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="menu_id" value="{{ $dessert->id_menu }}">
                                            <input type="hidden" name="price" value="{{ $dessert->price }}">
                                            <button type="submit" class="btn_style"
                                                onclick="return confirm('Data ini akan ditambahkan ke keranjang');">
                                                <i class="fas fa-cart-plus"></i></button>
                                        </form>
                                    @endauth
                                    <h3 class="card-title">{{ $dessert->nama_menu }}</h3>
                                    <p class="card-text">{{ $dessert->desc }}</p>
                                </figcaption>
                            </div>
                        </figure>
                        <div class="card-footer" style="bottom:5px;">
                            <h4 class="text-muted">Rp {{ number_format($dessert->price, 2, ',', '.') }}</h4>
                        </div>
                    </div>
                @endforeach

            </div>

    </main>

    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
                e.preventDefault();

                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>
@endsection
