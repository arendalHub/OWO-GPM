<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <style>
            #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
        </style>


        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>OWO-GPM | @yield('titre_page', '[TITRE DE PAGE]')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url
        ('asset_delight/assets-minified/images/icons/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ url('asset_delight/assets-minified/images/icons/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ url('asset_delight/assets-minified/images/icons/favicon.png') }}">



        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/admin-all-demo.css') }}">
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/chosen/chosen.css') }}">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/datatable/datatable.css') }}">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/touchspin/touchspin.css') }}">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/input-switch/inputswitch.css') }}">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/multi-select/multiselect.css') }}">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/uniform/uniform.css') }}">--}}
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


    <body>
        <div id="sb-site">

            <div id="page-wrapper">

                <!-- BEGIN LEFT -->
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
                </div>
                <div id="page-sidebar">
                    <div id="header-logo" class="logo-bg">
                        <a href="{{ url('/menu_modulaire') }}" class="logo-content-big" title="OWO-GPM">
                            OWO-GPM
                            <span>Gestion de Processus Métiers</span>
                        </a>
                        <a href="#" class="logo-content-small" title="OWO-GPM">
                            OWO-GPM
                            <span>Gestion de Processus Métiers</span>
                        </a>
                        <a id="close-sidebar" href="#" title="Close sidebar">
                            <i class="glyph-icon icon-outdent"></i>
                        </a>
                    </div>
                    <div class="scroll-sidebar">
                        <ul id="sidebar-menu">

                            @yield('menu')

                        </ul><!-- #sidebar-menu -->
                    </div>
                </div>
                <!-- END LEFT -->

                <!-- BEGIN CONTENT -->
                <div id="page-content-wrapper">
                    <div id="page-content">
                        <div id="page-header">
                            <div id="header-nav-left">
                                <a class="header-btn" id="logout-btn" href="lockscreen-4.html" title="Lockscreen page example">
                                    <i class="glyph-icon icon-linecons-lock"></i>
                                </a>
                                <div class="user-account-btn dropdown">
                                    <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                                        <img width="28" src="{{ url('asset_delight/assets-minified/image-resources/gravatar.jpg') }}" alt="Profile image">
                                        <span>[UTILISATEUR]</span>
                                        <i class="glyph-icon icon-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu float-right">
                                        <div class="box-sm">
                                            <div class="login-box clearfix">
                                                <div class="user-img">
                                                    <a href="#" title="" class="change-img">Change photo</a>
                                                    <img src="{{ url('asset_delight/assets-minified/image-resources/gravatar.jpg') }}" alt="">
                                                </div>
                                                <div class="user-info">
                                                    <span>
                                                        [UTILISATEUR]
                                                        <i>[PROFIL]</i>
                                                    </span>
                                                    <a href="#" title="Edit profile">Modifier informations de compte</a>
                                                    <a href="#" title="View notifications">Verrouiller</a>
                                                </div>
                                            </div>
                                            <div class="divider"></div>

                                            <div class="button-pane button-pane-alt pad5L pad5R text-center">
                                                <a href="{{ url('/login') }}" class="btn btn-flat display-block font-normal btn-danger">
                                                    <i class="glyph-icon icon-power-off"></i>
                                                    Deconnexion
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- #header-nav-left -->

                            <div id="header-nav-right">

                                <div class="dropdown" id="dashnav-btn">
                                    <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Dashboard Quick Menu">
                                        <i class="glyph-icon icon-linecons-cog"></i>
                                    </a>
                                    <div class="dropdown-menu float-left">
                                        <div class="box-sm">
                                            <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                                                <a href="#" class="btn vertical-button hover-blue-alt" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                                                    </span>
                                                    Dashboard
                                                </a>
                                                <a href="#" class="btn vertical-button hover-green" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                                                    </span>
                                                    Widgets
                                                </a>
                                                <a href="#" class="btn vertical-button hover-orange" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                                                    </span>
                                                    Tables
                                                </a>
                                                <a href="#" class="btn vertical-button hover-orange" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                                                    </span>
                                                    Charts
                                                </a>
                                                <a href="#" class="btn vertical-button hover-purple" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                                                    </span>
                                                    Buttons
                                                </a>
                                                <a href="#" class="btn vertical-button hover-azure" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                                                    </span>
                                                    Panels
                                                </a>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                                                <a href="#" class="btn vertical-button remove-border btn-info" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                                                    </span>
                                                    Dashboard
                                                </a>
                                                <a href="#" class="btn vertical-button remove-border btn-danger" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                                                    </span>
                                                    Widgets
                                                </a>
                                                <a href="#" class="btn vertical-button remove-border btn-purple" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                                                    </span>
                                                    Tables
                                                </a>
                                                <a href="#" class="btn vertical-button remove-border btn-azure" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                                                    </span>
                                                    Charts
                                                </a>
                                                <a href="#" class="btn vertical-button remove-border btn-yellow" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                                                    </span>
                                                    Buttons
                                                </a>
                                                <a href="#" class="btn vertical-button remove-border btn-warning" title="">
                                                    <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                        <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                                                    </span>
                                                    Panels
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown" id="notifications-btn">
                                    <a data-toggle="dropdown" href="#" title="">
                                        <span class="small-badge bg-yellow"></span>
                                        <i class="glyph-icon icon-linecons-megaphone"></i>
                                    </a>
                                    <div class="dropdown-menu box-md float-left">

                                        <div class="popover-title display-block clearfix pad10A">
                                            Notifications
                                            <a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
                                                More options...
                                            </a>
                                        </div>
                                        <div class="scrollable-content scrollable-slim-box">
                                            <ul class="no-border notifications-box">
                                                <li>
                                                    <span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>
                                                    <span class="notification-text">This is an error notification</span>
                                                    <div class="notification-time">
                                                        a few seconds ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-warning icon-notification glyph-icon icon-users"></span>
                                                    <span class="notification-text font-blue">This is a warning notification</span>
                                                    <div class="notification-time">
                                                        <b>15</b> minutes ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-green icon-notification glyph-icon icon-sitemap"></span>
                                                    <span class="notification-text font-green">A success message example.</span>
                                                    <div class="notification-time">
                                                        <b>2 hours</b> ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-azure icon-notification glyph-icon icon-random"></span>
                                                    <span class="notification-text">This is an error notification</span>
                                                    <div class="notification-time">
                                                        a few seconds ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
                                                    <span class="notification-text">This is a warning notification</span>
                                                    <div class="notification-time">
                                                        <b>15</b> minutes ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-blue icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text font-blue">Alternate notification styling.</span>
                                                    <div class="notification-time">
                                                        <b>2 hours</b> ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text">This is an error notification</span>
                                                    <div class="notification-time">
                                                        a few seconds ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text">This is a warning notification</span>
                                                    <div class="notification-time">
                                                        <b>15</b> minutes ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-green icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text font-green">A success message example.</span>
                                                    <div class="notification-time">
                                                        <b>2 hours</b> ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text">This is an error notification</span>
                                                    <div class="notification-time">
                                                        a few seconds ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                                                    <span class="notification-text">This is a warning notification</span>
                                                    <div class="notification-time">
                                                        <b>15</b> minutes ago
                                                        <span class="glyph-icon icon-clock-o"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-pane button-pane-alt pad5T pad5L pad5R text-center">
                                            <a href="#" class="btn btn-flat btn-primary" title="View all notifications">
                                                View all notifications
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" id="progress-btn">
                                    <a data-toggle="dropdown" href="#" title="">
                                        <span class="small-badge bg-azure"></span>
                                        <i class="glyph-icon icon-linecons-params"></i>
                                    </a>
                                    <div class="dropdown-menu pad0A box-sm float-left" id="progress-dropdown">
                                        <div class="scrollable-content scrollable-slim-box">
                                            <ul class="no-border progress-box progress-box-links">
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Finishing uploading files
                                                            <b>23%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="23">
                                                            <div class="progressbar-value bg-blue-alt">
                                                                <div class="progressbar-overlay"></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Roadmap progress
                                                            <b>91%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="91">
                                                            <div class="progressbar-value bg-red">
                                                                <div class="progressbar-overlay"></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Images upload
                                                            <b>58%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="58">
                                                            <div class="progressbar-value bg-green"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            WordPress migration
                                                            <b>74%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="74">
                                                            <div class="progressbar-value bg-purple"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Agile development procedures
                                                            <b>91%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="91">
                                                            <div class="progressbar-value bg-black">
                                                                <div class="progressbar-overlay"></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Systems integration
                                                            <b>58%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="58">
                                                            <div class="progressbar-value bg-azure"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <div class="progress-title">
                                                            Code optimizations
                                                            <b>97%</b>
                                                        </div>
                                                        <div class="progressbar-smaller progressbar" data-value="97">
                                                            <div class="progressbar-value bg-yellow"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-pane button-pane-alt pad5A text-center">
                                            <a href="#" class="btn btn-flat display-block font-normal hover-green" title="View all notifications">
                                                View all notifications
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- #header-nav-right -->

                        </div>
                        

                        <!-- xCharts -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/js-core/d3.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/charts/xcharts/xcharts.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/charts/xcharts/xcharts-demo-1.js') }}"></script>

                        <!-- Sparklines charts -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/charts/sparklines/sparklines.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/charts/sparklines/sparklines-demo.js') }}"></script>

                        <!-- Skycons -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/skycons/skycons.js') }}"></script>

                        <!-- Calendar -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/daterangepicker/moment.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/calendar/calendar.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/calendar/calendar-demo.js') }}"></script>

                        <!-- Data tables -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/datatable/datatable.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/datatable/datatable-bootstrap.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/datatable/datatable-tabletools.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/datatable/datatable-reorder.js') }}"></script>

                        <script type="text/javascript">

                            /* Datatables export */

                            $(document).ready(function() {
                                alert('YOOOO');
                                console.log('TOOT');
                                $('#datatable-example').dataTable();
                            });

                            $(document).ready(function() {
                                var table = $('#datatable-tabletools').DataTable();
                                var tt = new $.fn.dataTable.TableTools( table );

                                $( tt.fnContainer() ).insertBefore('#datatable-tabletools_wrapper div.dataTables_filter');

                                $('.DTTT_container').addClass('btn-group');
                                $('.DTTT_container a').addClass('btn btn-default btn-md');

                                $('.dataTables_filter input').attr("placeholder", "Recherche...");

                            } );

                            /* Datatables reorder */

                            $(document).ready(function() {
                                $('#datatable-reorder').DataTable( {
                                    dom: 'Rlfrtip'
                                });

                                $('#datatable-reorder_length').hide();
                                $('#datatable-reorder_filter').hide();

                            });

                            $(document).ready(function() {
                                $('.dataTables_filter input').attr("placeholder", "Recherche...");
                            });

                        </script>


                        <!-- jQueryUI Spinner -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/spinner/spinner.js') }}"></script>
                        <script type="text/javascript">
                            /* jQuery UI Spinner */

                            $(function() { "use strict";
                                $(".spinner-input").spinner();
                            });
                        </script>

                        <!-- jQueryUI Autocomplete -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/autocomplete/autocomplete.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/autocomplete/menu.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/autocomplete/autocomplete-demo.js') }}"></script>

                        <!-- Touchspin -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/touchspin/touchspin.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/touchspin/touchspin-demo.js') }}"></script>

                        <!-- Input switch -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/input-switch/inputswitch.js') }}"></script>
                        <script type="text/javascript">
                            /* Input switch */

                            $(function() { "use strict";
                                $('.input-switch').bootstrapSwitch();
                            });
                        </script>

                        <!-- Textarea -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/textarea/textarea.js') }}"></script>
                        <script type="text/javascript">
                            /* Textarea autoresize */

                            $(function() { "use strict";
                                $('.textarea-autosize').autosize();
                            });
                        </script>

                        <!-- Multi select -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/multi-select/multiselect.js') }}"></script>
                        <script type="text/javascript">
                            /* Multiselect inputs */

                            $(function() { "use strict";
                                $(".multi-select").multiSelect();
                                $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
                            });
                        </script>

                        <!-- Uniform -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/uniform/uniform.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/uniform/uniform-demo.js') }}"></script>

                        <!-- Chosen -->


                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/chosen/chosen.js') }}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/chosen/chosen-demo.js') }}"></script>


                        <!-- Input masks -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/input-mask/inputmask.js') }}"></script>

                        <script type="text/javascript">
                            /* Input masks */

                            $(function() { "use strict";
                                $(".input-mask").inputmask();
                            });

                        </script>


                        <!-- Bootstrap Modal -->

                        <!--<link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/modal/modal.css')}}
                        ">-->
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/modal/modal.js')}}"></script>

                        <!-- JS Interactions -->

                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/interactions-ui/resizable.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/interactions-ui/draggable.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/interactions-ui/sortable.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/interactions-ui/selectable.js')}}"></script>

                        <!-- jQueryUI Dialog -->

                        <!--<link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/dialog/dialog.css')}}">-->
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/dialog/dialog.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/dialog/dialog-demo.js')}}"></script>
                        
                        <!-- jGrowl notifications -->

                        <!--<link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/jgrowl-notifications/jgrowl.css')}}">-->
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/jgrowl-notifications/jgrowl.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/jgrowl-notifications/jgrowl-demo.js')}}"></script>
                        
                        <!-- Noty notifications -->
                        
                        <!--<link rel="stylesheet" type="text/css" href="{{ url('asset_delight/assets-minified/widgets/noty-notifications/noty.css')}}">-->
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/noty-notifications/noty.js')}}"></script>
                        <script type="text/javascript" src="{{ url('asset_delight/assets-minified/widgets/noty-notifications/noty-demo.js')}}"></script>
                        
                        
                        @yield('contenu_page')


                    </div>
                </div>
                <!-- END CONTENT -->
            </div>


            <!-- JS Demo -->
            <script type="text/javascript" src="{{ url('asset_delight/assets-minified/admin-all-demo.js') }}"></script>


        </div>
    </body>


</html>
