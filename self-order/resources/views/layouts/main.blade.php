<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nosh | {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link href=" /fontawesome/css/all.css" rel="stylesheet">
    <link href="/css/templatemo-style.css" rel="stylesheet" />

    <link href="/css/style-responsive.css" rel="stylesheet" />
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .btn_style {
            border: 1px solid #cecece;
            border-radius: 3px;
            padding: 3px 10px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
            color: white;
            background-color: #009933;
        }

        .btn_style:hover {
            border: 1px solid #b1b1b1;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            background-color: #33cc33;
        }

    </style>

</head>

<body>

    <div class="container">
        <!-- Top box -->
        <!-- Logo dan nama website -->
        @include('partials.navbar')


        <main>
            @yield('container')

        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; Silvia Siladevi Gosal</p>
        </footer>
    </div>

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
    @include('sweetalert::alert')

</body>

</html>
