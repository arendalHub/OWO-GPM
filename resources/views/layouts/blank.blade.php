<!DOCTYPE html> 
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <style>
            #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
        </style>


        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>OWO-GPM @yield('titre_page', '[Titre de page]') </title>
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
            @yield('contenu_page')
    </body>


</html>