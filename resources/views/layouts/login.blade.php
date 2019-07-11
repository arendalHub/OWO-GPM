<!DOCTYPE html> 
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <style>
            #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
        </style>


        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>OWO-GPM [Titre de page] </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ url('asset_delight/assets-minified/images/icons/favicon.png') }}">



        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/admin-all-demo.css') }}">

        <!-- JS Core -->

        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/js-core.js') }}"></script>


        <script type="text/javascript">
            $(window).load(function(){
                setTimeout(function() {
                    $('#loading').fadeOut( 400, "linear" );
                }, 300);
            });
        </script>



    </head>


    <body class="bg-black">

        <div class="center-vertical bg-black" style="margin-top: 10%">
            <div class="center-content">
                <form action="" id="login-validation" class="col-md-5 col-sm-5 col-xs-11 center-margin" method="">
                    <h3 class="text-center pad25B font-gray font-size-23">OWO - GPM <span class="opacity-80">[-Connexion-]</span></h3>
                    <div id="login-form" class="content-box" style="display: block;">
                        <div class="content-box-wrapper pad20A">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adresse Email:</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon addon-inside bg-white font-primary"> <i class="glyph-icon icon-envelope-o"></i></span> 
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer votre email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de Passe:</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-unlock-alt"></i></span> 
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
                                </div>
                            </div>
                        </div>
                        <div class="button-pane">
                            <button type="submit" class="btn btn-block btn-primary">CONNEXION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>


</html>