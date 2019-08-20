<!DOCTYPE html>
<html lang="">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>OWO-GPM</title>


  <link rel="shortcut icon" href="{{ url('asset_delight/assets-minified/images/icons/owo_gpm_logo_favicon.png') }}">
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

<body class="bg-gradient-blue3">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Navbar -->

<!-- Main content -->
<div class="main-content">
  <!-- Header -->
  <div class="header bg-gradient-blue3 py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-6 col-md-8 px-5">
            <h1 class="text-white" style="font-size:35px; font-weight: bold; margin-bottom:unset;">OWO - GPM</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-jaune2" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>CONNECTEZ-VOUS</small>
              @if (Session::has('message'))
                <h4 class="text-danger">{{Session::get('message')}}</h4>  
              @endif
            </div>
            <form role="form" method="POST" action="{{ url('connexion') }}">
              @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                  </div>
                  <input id="login" name="login" type="text" class="form-control" placeholder="Login" value="{{ old('login')}}" required autofocus>
                  @if ($errors->has('login'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('login') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input id="password" placeholder="Mot de passe" type="password" class="form-control" name="password" required autocomplete="current-password">

                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success my-4">Se Connecter</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Footer -->

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