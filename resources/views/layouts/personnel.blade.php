@extends('layouts.default')

@section('titre_page')
PERSONNEL
@endsection('titre_page')

@section('menu')
    <li class="header"><span>GESTION OPERATIONS PERSONNEL</span></li>
    <li>
        <a href="{{ url('/personnel/employe') }}" title="Employes">
            <i class="glyph-icon icon-users"></i>
            <span>Employes</span>
        </a>
    </li>
     <li>
         <a href="{{ url('/personnel/zone') }}" title="Zones">
             <i class="glyph-icon icon-globe"></i>
             <span>Zones</span>
         </a>
     </li>
     <li>
         <a href="{{ url('/personnel/section') }}" title="Sections">
             <i class="glyph-icon icon-linecons-location"></i>
             <span>Sections</span>
         </a>
     </li>
     <li>
         <a href="{{ url('/personnel/site') }}" title="Sites">
             <i class="glyph-icon icon-building"></i>
             <span>Sites</span>
         </a>
     </li>
@endsection('menu')



@section('contenu_page')
    <div id="page-title">
        <h2>@yield('titre_contenu', 'OPERATIONS PERSONNEL')</h2>
        <p>@yield('sous_titre_contenu', '[SOUS MODULE]')</p>
    </div>

    <div class="row">
        @yield('contenu', '[EN COURS DE DEVELOPPEMENT]')
    </div>
@endsection('contenu_page')

