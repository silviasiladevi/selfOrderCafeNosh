<div class="placeholder">
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/Nosh/NoshHome.jpeg">
        <div class="tm-header">

            <div class="row tm-header-inner">
                <div class="col-md-2 col-12 ">
                    <img src="img/Nosh/NoshLogoPutih.png" alt="Logo" class="tm-site-logo" style="height: 200px" />
                </div>

                <nav class="col-md-2 col-12">
                    <ul class="tm-nav-ul">
                        @can('admin')
                            <li class="tm-nav-li">
                                <a class="tm-nav-link {{ $title === 'admin' ? 'active' : '' }}" href="/homeAdmin">Admin</a>
                            </li>
                        @endcan
                        @can('kasir')
                            <li class="tm-nav-li">
                                <a class="tm-nav-link {{ $title === 'kasir' ? 'active' : '' }}"
                                    href="/homeAdmin">Kasir</a>
                            </li>
                        @endcan
                        <li class="tm-nav-li">
                            <a class="tm-nav-link {{ $title === 'Menu' ? 'active' : '' }}" href="/">Menu</a>
                        </li>
                        <li class="tm-nav-li">
                            <a class="tm-nav-link {{ $title === 'About' ? 'active' : '' }}" href="/about">About</a>
                        </li>
                        @auth
                            <li class="tm-nav-li">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a class="tm-nav-link {{ $title === 'Logout' ? 'active' : '' }}" href="">
                                        <button type="submit" style="background-color: transparent; border:none"
                                            class="tm-nav-link {{ $title === 'Logout' ? 'active' : '' }}">
                                            <h2 style="font-style: normal">Logout</h2>
                                        </button>
                                    </a>
                                </form>
                                {{-- <a class="tm-nav-link {{ $title === "Logout" ? 'active' : ''}}"  href="/index">Logout</a> --}}
                            </li>
                        @endauth

                        @guest
                            <li class="tm-nav-li">
                                <a class="tm-nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login">
                                    <button type="submit" style="background-color: transparent; border:none"
                                        class="tm-nav-link">
                                        <h2 style="font-style: normal">Login</h2>
                                    </button>
                                </a>
                            </li>
                        @endguest
                        {{-- <li class="tm-nav-li"><a href="userPage.php" class="tm-nav-link active">Home</a></li>
                        <li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
                        <li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Logout</a></li> --}}

                    </ul>
                </nav>

            </div>

        </div>

    </div>

</div>
