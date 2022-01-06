@extends('layouts.main')

@section('container')

    <main>
        <header class="row tm-welcome-section">
            <img src="/img/Nosh/NoshLogo.png" alt="logo" style="height: 200px">

            <p class="col-12 text-center"> NOSH web merupakan fitur buku menu baru dari cafe NOSH dimana pelanggan
                dapat melihat menu
                hanya dengan mengakses web, Pelanggan dapat memesan menu yang acckan di beli dengan memasukkan menu ke cart.
            </p>
        </header>

        <center>

            <div class="tm-container-inner tm-persons">

                <article class="col-lg-6">

                    <img width="300px" src="img/Nosh/open.jpeg" alt="Image" class="img-fluid tm-person-img" />
                    <figcaption class="tm-person-description"></figcaption>
                    <h4 class="tm-person-name">Our Opening Hours</h4>
                    <p class="tm-person-title">11 AM - 11 PM | Friday - Sunday</p>
                    <p class="tm-person-about"> Coffee with a friend is like capturing happiness in a cup</p>
                    <div>
                        <a href="https://web.facebook.com/silvia.s.devi.104" class="tm-social-link"><i
                                class="fab fa-facebook tm-social-icon"></i></a>
                        <a href="https://twitter.com" class="tm-social-link"><i
                                class="fab fa-twitter tm-social-icon"></i></a>
                        <a href="https://www.instagram.com/noshcafe.id/" class="tm-social-link"><i
                                class="fab fa-instagram tm-social-icon"></i></a>
                    </div>
                    </figcaption>

                </article>

            </div>

        </center>

        <div class="tm-container-inner tm-featured-image">
            <div class="row">
                <div class="col-12">
                    <div class="placeholder-2">
                        <div class="parallax-window-2" data-parallax="scroll" data-image-src="img/about-05.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-container-inner tm-features">

        </div>
        <div class="tm-container-inner tm-history">
            <div class="row">
                <div class="col-12">
                    <div class="tm-history-inner">
                        <img src="img/about-06.jpg" alt="Image" class="img-fluid tm-history-img" />
                        <div class="tm-history-text">
                            <h4 class="tm-history-title">Alamat</h4>
                            <p class="tm-mb-p">H.M Arsyad No. 2 (ATM BCA)</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
