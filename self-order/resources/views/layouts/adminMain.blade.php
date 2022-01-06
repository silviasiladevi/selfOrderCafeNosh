<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />

    <link href=" /fontawesome/css/all.css" rel="stylesheet">

    <title>{{ $title }}| Nosh</title>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/homeAdmin">
                <div class="sidebar-brand-icon ">
                    <img src="/img/Nosh/logoPutih.png" alt="logo" style="height: 60px">
                </div>
                @can('admin')
                    <div class="sidebar-brand-text mx-3">NOSH Admin </div>
                @endcan
                @can('kasir')
                    <div class="sidebar-brand-text mx-3">NOSH Kasir </div>
                @endcan

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $title === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/homeAdmin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            @can('admin')

                <li class="nav-item {{ $title === 'menu' ? 'active' : '' }}">
                    <a class="nav-link" href="/homeAdmin/kelolamenu">
                        <i class="fas fa-utensils"></i>
                        <span>
                            Kelola Menu
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ $title === 'user' ? 'active' : '' }}">
                    <a class="nav-link" href="/homeAdmin/kelolauser">
                        <i class="fas fa-address-book"></i>
                        <span>
                            Kelola User
                        </span>
                    </a>
                </li>
            @endcan



            <li class="nav-item {{ $title === 'trx' ? 'active' : '' }}">
                <a class="nav-link" href="/homeAdmin/keloladaftar">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kelola Daftar Transaksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->

                    <div class="d-none d-sm-inline-block  mr-auto ml-md-3 my-2 my-md-0 mw-100">

                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $page }}</div>

                    </div>
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <a class="nav-link" href="/dashboard">Keluar &nbsp;
                            <i class="fas fa-sign-out-alt"></i>
                        </a>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section id="main-content">
                        <section class="wrapper">

                            <!-- page start-->

                            @yield('container')

                            <!-- page end-->
                        </section>
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
                    </script>



                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                                        crossorigin="anonymous">
                    </script>
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            var t = $('#dataTable').DataTable({
                                "columnDefs": [{
                                    "searchable": false,
                                    "orderable": false,
                                    "targets": 0
                                }],
                                "order": [
                                    [1, 'asc']
                                ]
                            });

                            t.on('order.dt search.dt', function() {
                                t.column(0, {
                                    search: 'applied',
                                    order: 'applied'
                                }).nodes().each(function(cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();
                        });
                    </script>




                    <!-- ck editor -->
                    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
                    <!-- custom form component script for this page-->


                    <!-- Bootstrap core JavaScript-->
                    <script src="/vendor/jquery/jquery.min.js"></script>
                    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="/js/demo/datatables-demo.js"></script>



                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

                <footer class="sticky-footer bg-white">

                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Nosh Cafe & Eatery</span>
                        </div>
                    </div>
                </footer>
            </div>

            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            @include('sweetalert::alert')

</body>


</html>
