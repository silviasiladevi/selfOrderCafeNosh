<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link href=" /fontawesome/css/all.css" rel="stylesheet">

    <title>{{ $title }}| Nosh</title>

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    {{-- <link href="/css/bootstrap-theme.css" rel="stylesheet"> --}}

    <!-- font icon -->
    <link href="/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />

    <!-- date picker -->
    <link href="/css/daterangepicker.css" rel="stylesheet" />
    <link href="/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- color picker -->
    {{-- <link href="/css/bootstrap-colorpicker.css" rel="stylesheet" /> --}}
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">


        <!-- End of Sidebar -->
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header dark-bg">
                <!--logo start-->
                <a href="/dashboard" class="logo">NOSH <span
                        class="lite">{{ $page }}</span></a>
                <!--logo end-->


                <div class="top-nav notification-row">
                    <a class="btn btn-danger btn-lg" href="/dashboard">Home</a>


                </div>

            </header>


            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">


                    <!-- page start-->

                    @yield('container')
                    <div id="wrapper">

                        <!-- page end-->
                </section>
            </section>
            <!--main content end-->
            <footer>
                <div class="container my-auto col-lg-12">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Silvia 2021</span>
                    </div>
                </div>
            </footer>
        </section>
        <script type="text/javascript">
            var exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = event.relatedTarget
                // Extract info from data-bs-* attributes
                var recipient = button.getAttribute('data-bs-whatever')
                // If necessary, you could initiate an AJAX request here
                // and then do the updating in a callback.
                //
                // Update the modal's content.
                var modalTitle = exampleModal.querySelector('.modal-title')
                var modalBodyInput = exampleModal.querySelector('.modal-body input')

                modalTitle.textContent = 'New message to ' + recipient
                modalBodyInput.value = recipient
            })

            function inputan() {


                var total = document.getElementByClassName("total");
                var bayar = document.getElementByClassName("bayar");
                console.log(total);
                console.log(bayar);

                var y = document.getElementsByClassName("total");
                var i;
                for (i = 0; i < y.length; i++) {
                    var kembalian;
                    kembalian = parseInt(bayar[i].value) - parseInt(total[i].value);
                    document.getElementById("kembali").innerHTML.relatedTarget = kembalian;
                }



            }
        </script>


        <!-- javascripts -->
        {{-- <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script> --}}

        <!-- nice scroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- jquery ui -->
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <!--custom checkbox & radio-->
        <script type="text/javascript" src="js/ga.js"></script>
        <!--custom switch-->
        <script src="js/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
        <script src="js/jquery.tagsinput.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="js/jquery.hotkeys.js"></script>
        <script src="js/bootstrap-wysiwyg.js"></script>
        <script src="js/bootstrap-wysiwyg-custom.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap-colorpicker.js"></script>
        <script src="js/daterangepicker.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <!-- ck editor -->
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <!-- custom form component script for this page-->
        <script src="js/form-component.js"></script>
        <!-- custome script for all page -->
        <script src="js/scripts.js"></script>

        @include('sweetalert::alert')


</body>

</html>
