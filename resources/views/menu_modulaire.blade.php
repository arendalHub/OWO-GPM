@extends('layouts.blank')


@section('titre_page')
MODULES
@endsection('titre_page')


@section('contenu_page')
<div class="center-vertical bg-black" style="margin-top: 5%;">
    <div class="center-content col-md-10 col-md-offset-1">
        <h2 class="text-center pad25B font-gray font-size-43"> MENU MODULAIRE </span> </h2>

        <div class="example-box-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-orange col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            GESTION STOCKS
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-dashboard"></i>
                            <div class="tile-content">
                                STOCKS
                            </div>
                        </div>
                        <a href="{{ url('/stock') }}" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-blue-alt col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            GESTION OPERATIONS DU PERSONNEL
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-tag"></i>
                            <div class="tile-content">
                                PERSONNEL
                            </div>
                        </div>
                        <a href="{{ url('/personnel') }}" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-green col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            GESTION PATRIMOINE
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-tag"></i>
                            <div class="tile-content">
                                PATRIMOINE
                            </div>
                        </div>
                        <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>

            <div class="row">
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-primary col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            GESTION PARC ROULANT
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-dashboard"></i>
                            <div class="tile-content">
                                PARC ROULANT
                            </div>
                        </div>
                        <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-black col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            GESTION CLIENTELE
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-tag"></i>
                            <div class="tile-content">
                                CLIENTELE
                            </div>
                        </div>
                        <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile-box tile-box-alt bg-default col-md-10 col-md-offset-1">
                        <div class="tile-header">
                            PARAMETRAGE
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-tag"></i>
                            <div class="tile-content">
                                PARAMETRAGE
                            </div>
                        </div>
                        <a href="{{ url('Parametre') }}" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                            Accès au module
                            <i class="glyph-icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <h4 class="text-center pad25B font-gray font-size-20"> OWO - GPM </span> </h4>


    </div>
</div>
@endsection('contenu_page')
