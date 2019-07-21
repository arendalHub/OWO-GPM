@extends('layouts.stock')

@section('titre_contenu')
FOURNISSEUR
@endsection('titre_contenu')

@section('sous_titre_contenu')
ENREGISTREMENT / MODIFICATION D'UN FOURNISSEUR
@endsection('sous_titre_contenu')

@section('contenu_page')

<div class="panel">
    <div class="panel-body">
        @if(Session::has('error'))
            @include('stock.error', ['type'=>'warning', 'key'=>'error'])
        @endif
        @if(Session::has('message'))
            @include('stock.error', ['type'=>'info', 'key'=>'message'])
        @endif
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" method="POST" action="{{url('/stock/fournisseur/do_create_update')}}" id="demo-form" data-parsley-validate>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Désignation</label>
                            <div class="col-sm-6">
                                <input 
                                 value="@if(($fournisseur != null && $update)){{$fournisseur->designation_fournisseur}}@else{{old('designation_fournisseur')}} @endif"
                                 class="form-control"
                                 required
                                 name="designation_fournisseur"
                                 placeholder="Désignation du fournisseur" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Adresse</label>
                            <div class="col-sm-6">
                                <input 
                                 value="@if(($fournisseur != null && $update)) {{$fournisseur->adresse_fournisseur}}@else {{old('adresse_fournisseur')}} @endif"
                                 name="adresse_fournisseur"
                                 class="form-control" 
                                 placeholder="Adresse du fournisseur" 
                                 type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contact</label>
                            <div class="col-sm-6">
                                <input 
                                 value="@if(($fournisseur != null && $update)) {{$fournisseur->contact_fournisseur}}@else {{old('contact_fournisseur')}} @endif"
                                 name="contact_fournisseur"
                                 class="form-control" 
                                 required placeholder="Contact du fournisseur" 
                                 type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input 
                                 value="@if(($fournisseur != null && $update)) {{$fournisseur->email_fournisseur}}@else {{old('email_fournisseur')}} @endif"
                                 name="email_fournisseur" 
                                 class="form-control" 
                                 placeholder="Email du fournisseur" 
                                 type="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Boite postale</label>
                            <div class="col-sm-6">
                                <input 
                                 value="@if(($fournisseur != null && $update)) {{$fournisseur->bp_fournisseur}}@else {{old('bp_fournisseur')}} @endif"
                                 name="bp_fournisseur" 
                                 class="form-control" 
                                 placeholder="Boite postale du fournisseur" 
                                 type="text"/>
                            </div>
                        </div>
                        <input type="text" name="update" value="{{$update}}" hidden>
                        @if(($fournisseur != null && $update))
                            <input type="text" name="id_fournisseur" value="{{$fournisseur->id_fournisseur}}" hidden />
                        @endif
                        @csrf
                        <div class="bg-default content-box text-center pad20A mrg25T">
                            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                            <button type="reset" class="btn btn-lg btn-default">Effacer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('contenu_page')
