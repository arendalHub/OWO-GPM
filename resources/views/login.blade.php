@extends('layouts.blank')


@section('titre_page')
CONNEXION
@endsection('titre_page')


@section('contenu_page')
    <div class="center-vertical bg-black" style="margin-top: 6%">
        <div class="center-content">
            <form action="" id="login-validation" class="col-md-5 col-sm-5 col-xs-11 center-margin" method="">
                <h3 class="text-center pad25B font-gray font-size-23">OWO - GPM <br><span class="opacity-80">[Connectez-vous]</span> </h3>
                <div id="login-form" class="content-box" style="display: block;">
                    <div class="content-box-wrapper pad20A">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom d'utilisateur:</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon addon-inside bg-white font-primary"> <i class="glyph-icon icon-envelope-o"></i></span> 
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer votre nom d'utilisateur">
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
                        {{-- <button type="submit" class="btn btn-block btn-primary">CONNEXION</button> --}}
                        <a href="{{ url('/menu_modulaire') }}" class="btn btn-block btn-primary">CONNEXION</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection('contenu_page')
