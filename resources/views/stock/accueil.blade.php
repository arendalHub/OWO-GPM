@extends('layouts.stock')

@section('titre_contenu')
STOCKS
@endsection('titre_contenu')

@section('sous_titre_contenu')
GESTION DE STOCKS
@endsection('sous_titre_contenu')

@section('contenu_page')


<div class="panel">
    <div class="panel-body">

        <div class="example-box-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{url('/stock/alert')}}">
                        <div class="tile-box tile-box-alt bg-yellow">
                            <div class="tile-header" style="font-size: 32px; font-weight: bold;">
                                STOCK SEUIL
                            </div>
                            <br /><br />
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                                <div class="tile-content" style="font-size: 32px; font-weight: bold;">
                                    {{ $alert->nb }}
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{url('/stock/critique')}}">
                        <div class="tile-box tile-box-alt bg-orange">
                            <div class="tile-header" style="font-size: 32px; font-weight: bold;">
                                SEUIL CRITIQUE
                            </div>
                            <br /><br />
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                                <div class="tile-content" style="font-size: 32px; font-weight: bold;">
                                    {{ $crit->nb }}
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    </a>
                </div>


                <div class="col-md-4">
                    <a href="{{url('/stock/rupture')}}">
                        <div class="tile-box tile-box-alt bg-red">
                            <div class="tile-header" style="font-size: 32px; font-weight: bold;">
                                RUPTURE DE STOCK
                            </div>
                            <br /><br />
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                                <div class="tile-content" style="font-size: 32px; font-weight: bold;">
                                    {{ $rupt->nb }}
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    </a>
                </div>


                <div class="col-md-6">
                    <a href="{{url('/stock/commande/list')}}">
                        <div class="tile-box tile-box-alt bg-info">
                            <div class="tile-header" style="font-size: 32px; font-weight: bold;">
                                COMMANDES EFFECTUEES
                            </div>
                            <br /><br />
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                                <div class="tile-content" style="font-size: 32px; font-weight: bold;">
                                    {{ $emis->nb }}
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="#">
                        <div class="tile-box tile-box-alt bg-black">
                            <div class="tile-header" style="font-size: 32px; font-weight: bold;">
                                ARTICLES PERIMES
                            </div>
                            <br /><br />
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                                <div class="tile-content" style="font-size: 32px; font-weight: bold;">
                                    {{-- {{ $perim->nb }} --}}---
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('contenu_page')
