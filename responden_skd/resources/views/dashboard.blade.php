<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin - Simane reda
    </title>
    <link rel="icon" href="{{ url('/assets') }}/img/application.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.7/r-2.5.0/datatables.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/responden_table.css" rel="stylesheet" />
    <link href="{{ url('/') }}/css/styles.css" rel="stylesheet" />
    <!-- Phone Prefix CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <!-- Phone Prefix JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.7/r-2.5.0/datatables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <link href="{{ url('/css') }}/guest_page/select2-bootstrap4.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    @include('sweetalert::alert')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="{{ url('/assets') }}/img/question-mark.png" alt="" class="simane-logo ml-3"><a
            class="navbar-brand ps-2" href="{{ url('/') }}">Simane reda</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-2 me-lg-0 mr-3" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i
                        class="fas fa-user fa-fw pr-2"></i>{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="get">
                            @csrf
                            <a class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();"
                                href="{{ route('logout') }}">Logout</a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        @can('is-admin')
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link" href="{{ url('/admin/data_responden') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                                Manajemen Responden
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manajemen Buku Perpustakaan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Laporan Peminjaman Buku</a>
                                    <a class="nav-link" href="{{ url('/admin/data_buku_perpus') }}">Data Buku
                                        Perpustakaan</a>
                                    <a class="nav-link" href="{{ url('/admin/data_peminjam_buku') }}">Data Peminjam
                                        Buku</a>
                                </nav>
                            </div>
                        @endcan
                        {{-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> --}}
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('container')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"><img class="logo-bps" src="{{ url('/assets') }}/img/logo_bps.png"
                                alt=""> BPS Kota Gunungstioli
                            {{ date('Y') }} &copy;</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/js/app.js"></script>
    <script src="{{ url('/') }}/js/scripts.js"></script>
    <script>
        let _ydata_affiliation = {!! json_encode($affiliations) !!};
        let _xdata_affiliation = {!! json_encode($num_affiliation) !!};
        let _ydata = {!! json_encode($months) !!};
        let _xdata = {!! json_encode($num_responden) !!};
    </script>
    <script src="{{ url('/') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ url('/') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        // $(document).on('select2:open', () => {
        //     document.querySelector('.select2-search__field').focus();
        // });
        $(".admin-edit-responden").prependTo("body");
        $(document).ready(function() {
            $('.modal-edit-admin-peminjam').on('show.bs.modal', function() {
                $(this).find('#adminEditJudulBukuDipinjam').each(function() {
                    $(this).select2({
                        theme: 'bootstrap-5',
                        placeholder: 'Pilih Judul Buku',
                        ajax: {
                            url: "adminEditJudulBukuDipinjam",
                            processResults: function({
                                data
                            }) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            id: item.judul_buku,
                                            text: item.judul_buku
                                        }
                                    })
                                }
                            }
                        }
                    });
                });
            });
            $('#datatable-responden').DataTable({
                orderCellsTop: true,
                responsive: true,
                columnDefs: [{
                        className: "dt-head-center",
                        targets: '_all'
                    },
                    {
                        width: 150,
                        targets: 1
                    },
                    {
                        width: 200,
                        targets: 5
                    },
                    {
                        width: 150,
                        targets: 4
                    },
                    {
                        className: "dt-body-center",
                        targets: [2, 3, 4, 6]
                    },
                ],
                initComplete: function() {
                    this.api()
                        .columns(2)
                        .every(function() {
                            let column = this;

                            // Create select element
                            let select = document.createElement('select');
                            select.add(new Option('-- Pilih Status --', ''));
                            column.footer().replaceChildren(select);

                            // Apply listener for user change in value
                            select.addEventListener('change', function() {
                                var val = DataTable.util.escapeRegex(select.value);

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                            // Get the search data for the first column and add to the select list
                            this
                                .cache('search')
                                .sort()
                                .unique()
                                .each(function(d) {
                                    select.append(new Option(d));
                                });
                        });
                }
            });
            $('#dataRequestTime').datepicker({
                uiLibrary: "bootstrap5",
                format: 'yyyy-mm-dd'
            });
            $('.modal-edit').on('show.bs.modal', function() {
                $('#dataRequestTime').datepicker({
                    uiLibrary: "bootstrap5",
                    format: 'yyyy-mm-dd'
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable-buku').DataTable({
                orderCellsTop: true,
                responsive: true,
                columnDefs: [{
                        className: "dt-head-center",
                        targets: '_all'
                    },
                    {
                        width: 190,
                        targets: 0
                    },
                    {
                        width: 160,
                        targets: [1]
                    },
                    {
                        width: 110,
                        targets: [2, 3, 4]
                    },
                    {
                        width: 70,
                        targets: [5]
                    },
                    {
                        className: "dt-body-center",
                        targets: [1, 2, 3, 4, 5]
                    },
                ],
                initComplete: function() {
                    this.api()
                        .columns(2)
                        .every(function() {
                            let column = this;

                            // Create select element
                            let select = document.createElement('select');
                            select.add(new Option('-- Pilih Status --', ''));
                            column.footer().replaceChildren(select);

                            // Apply listener for user change in value
                            select.addEventListener('change', function() {
                                var val = DataTable.util.escapeRegex(select.value);

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                            // Get the search data for the first column and add to the select list
                            this
                                .cache('search')
                                .sort()
                                .unique()
                                .each(function(d) {
                                    select.append(new Option(d));
                                });
                        });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable-peminjam-buku').DataTable({
                orderCellsTop: true,
                responsive: true,
                columnDefs: [{
                        className: "dt-head-center",
                        targets: '_all'
                    },
                    {
                        width: 150,
                        targets: 0
                    },
                    {
                        width: 200,
                        targets: 2
                    },
                    {
                        className: "dt-body-center",
                        targets: [1, 2, 3, 4, 5]
                    },
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable-responden').on('click', '.hapusResponden', function(e) {
                e.preventDefault();
                // alert('halo');
                let href = $(this).attr('href');
                console.log(href)
                Swal.fire({
                    title: "Hapus Data!",
                    text: "Apakah kamu yakin ingin menghapus data?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus data",
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });

            $('#datatable-buku').on('click', '.hapusDataBuku', function(e) {
                e.preventDefault();
                // alert('halo');
                let href = $(this).attr('href');
                console.log(href)
                Swal.fire({
                    title: "Hapus Data!",
                    text: "Apakah kamu yakin ingin menghapus data?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus data",
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });

            $('#datatable-peminjam-buku').on('click', '.hapusDataPeminjamBuku', function(e) {
                e.preventDefault();
                // alert('halo');
                let href = $(this).attr('href');
                console.log(href)
                Swal.fire({
                    title: "Hapus Data!",
                    text: "Apakah kamu yakin ingin menghapus data?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus data",
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });

            $('#datatable-responden').on('click', '.editDataResponden', function(e) {
                e.preventDefault();
                $('#dataRequestTimeEdit').datepicker({
                    uiLibrary: "bootstrap5",
                    format: 'yyyy-mm-dd',
                    parentEl: ".modal-edit"
                });
                const phoneInputField = document.querySelector("#phoneEdit");
                const phoneInput = window.intlTelInput(phoneInputField, {
                    initialCountry: "auto",
                    nationalMode: false,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                });
            })
        })
    </script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            nationalMode: false,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
</body>

</html>
