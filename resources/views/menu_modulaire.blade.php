<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="AADUAYOM MESSAN Ekoue Enoc">
    <title>OWO-GPM</title>


    <link rel="shortcut icon" href="{{ url('asset_delight/assets-minified/images/icons/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ URL::to('templates/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{ URL::to('templates/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <!-- Google Tag Manager -->
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/quill/dist/quill.core.css')}}">

    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('templates/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ URL::to('templates/assets/css/argon.min9f1e.css?v=1.1.0')}}" type="text/css">




    <!-- End Google Tag Manager -->
</head>

<body class="bg-gradient-green2">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Sidenav -->

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Top navbar -->
    <div class="header bg-gradient-lions py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <h1 class="text-white" align="center" style="font-size:55px; font-weight: bold;">MENU MODULAIRE</h1>

        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-green2" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Header -->


    <!-- Page content -->
    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                {{-- <a href="{{ (Auth::User()->profil_temporaire == 'Stock')? url('/stock') : '#' }}"> --}}
                <a href="{{ url('/stock')}}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <button class="icon icon-shape bg-red text-white rounded-circle shadow"><i
                                                    class="fas fa-cubes"> </i></button> <br/> GESTION STOCKS</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6">
                {{-- <a href="{{ (Auth::User()->profil_temporaire == 'Personnel')? url('/personnel') : '#' }}"> --}}
                <a href="{{ url('/personnel') }}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>

                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <button class="icon icon-shape bg-blue3 text-white rounded-circle shadow"><i class="fas fa-user-friends"></i></button> <br/> GESTION OPERATIONS DU PERSONNEL</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6">
                <a href="#">
                    <div class="card card-stats mb-4 mb-xl-0" style="background:  gray">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <a class="icon icon-shape bg-gray text-white rounded-circle shadow"><i class="fas fa-building"></i></a> <br/> GESTION PATRIMOINE</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <br/>
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <a href="#">
                    <div class="card card-stats mb-4 mb-xl-0" style="background:  gray">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <a class="icon icon-shape bg-gray text-white rounded-circle shadow"><i class="fas fa-car"></i></a> <br/> GESTION PARC ROULANT</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6">
                <a href="#">
                    <div class="card card-stats mb-4 mb-xl-0" style="background:  gray">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <a class="icon icon-shape bg-gray text-white rounded-circle shadow"><i class="fas fa-users"></i></a> <br/> GESTION CLIENTELE</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6">
                <a>
                    <div class="card card-stats mb-4 mb-xl-0" style="background:  gray">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <p class="h2 font-weight-bold mb-0" align="center" style="font-size:20px; font-weight: bold;">
                                        <a class="icon icon-shape bg-gray text-white rounded-circle shadow"><i class="fas fa-dollar-sign"></i></a> <br/> GESTION COMPTABLE</p>
                                    <br/><br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <br/>



        <br/>

        <h1 class="text-white" align="center">OWO - GPM</h1>

        <h1 class="text-white" align="center">
            <a href="{{ url('parametre') }}"> <i class="fas fa-cogs"></i></a>
        </h1>

    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ URL::to('templates/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{ URL::to('templates/assets/vendor/chart.js')}}/dist/Chart.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/chart.js')}}/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->

<script src="{{ URL::to('templates/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

<script src="{{ URL::to('templates/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/quill/dist/quill.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{ URL::to('templates/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

<script src="{{ URL::to('templates/assets/js/argon.min9f1e.js')}}?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->



<script src="{{ URL::to('templates/assets/js/demo.min.js')}}"></script>

</body>


</html>