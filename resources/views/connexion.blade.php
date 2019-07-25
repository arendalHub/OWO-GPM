@extends('layouts.blank')


@section('titre_page')
CONNEXION
@endsection('titre_page')


@section('contenu_page')
    <div class="center-vertical bg-black" style="margin-top: 6%">
        <div class="center-content">
            <form action="connexion" id="login-validation" class="col-md-5 col-sm-5 col-xs-11 center-margin" method="post">
                <h3 class="text-center pad25B font-gray font-size-23">OWO - GPM <br><span class="opacity-80">[Connectez-vous]</span> </h3>
                @csrf
                <div id="login-form" class="content-box" style="display: block;">
                    @if(isset($message))
                        <div class="alert alert-danger">
                            <a href="#" title="Fermer" class="glyph-icon alert-close-btn icon-remove"></a>
                            <div class="bg-red alert-icon">
                                <i class="glyph-icon icon-times"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">ERREUR</h4>
                                <p>{{$message}}</p>
                            </div>
                        </div>
                    @endif


                    <div class="content-box-wrapper pad20A">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom d'utilisateur:</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon addon-inside bg-white font-primary"> <i class="glyph-icon icon-user"></i></span>
                                <input type="text" class="form-control" id="login" name="login" placeholder="Entrez votre nom d'utilisateur" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe:</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-unlock-alt"></i></span> 
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                            </div>
                        </div>
                    </div>
                    <div class="button-pane">
                         <button type="submit" class="btn btn-block btn-primary">CONNEXION</button>
{{--                        <a href="{{ url('/menu_modulaire') }}" class="btn btn-block btn-primary">CONNEXION</a>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection('contenu_page')
