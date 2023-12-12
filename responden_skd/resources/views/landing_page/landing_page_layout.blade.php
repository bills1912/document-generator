<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simane reda</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ url('/assets') }}/img/application.png">
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Phone Prefix CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #f8f8f8;
        }
    </style>
    <!-- Core theme CSS (includes Bootstrap)-->
    {{-- <link rel="stylesheet" href="{{ url('/') }}/css/style.css"> --}}
    <link rel="stylesheet" href="{{ url('/') }}/css/responden_table.css">
    <link href="{{ url('/') }}/css/landing_page/styles.css" rel="stylesheet" />
    <script defer src="{{ url('/') }}/js/landing_page/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.7/r-2.5.0/datatables.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.7/r-2.5.0/datatables.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column bg-light h-100">
    @include('sweetalert::alert')
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ url('/') }}"><span class="fw-bolder text-primary">Simane
                        reda</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link chips-username" href="#"><i
                                    class="fa-regular fa-circle-user pr-1"></i>{{ Auth::user()->name }}</a></li>
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item {{ Request::is('projects') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/projects') }}">Fitur</a></li>
                        @can('is-admin')
                            <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin</a></li>
                        @endcan
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="get">
                                @csrf
                                <a class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();"
                                    href="{{ route('logout') }}">Logout</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('landing_page')
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0"><img class="logo-bps" src="{{ url('/assets') }}/img/logo_bps.png"
                            alt=""> BPS Kota Gunungstioli
                        {{ date('Y') }} &copy;</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{-- <script src="{{ url('/') }}/js/scripts.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script>
        const phoneInputField = document.querySelector("#guestPhone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            seperateDialCode: true,
            nationalMode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
</body>

</html>
