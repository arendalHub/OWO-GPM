{{-- Portion de code pour afficher de message d'erreur ou d'information --}}
{{-- $type doit prendre la valeur info pour un message d'information ou warning pour une erreur --}}
<h3 align="center" class="form-message alert alert-{{$type}} title-hero">
    <span class="">{{Session::get($key)}} <i class="close" onclick="hideError()">&times;</i></span>
    <script>
        function hideError() {
            document.getElementsByClassName('form-message')[0].style.display = 'none' ;
        }
    </script>
</h3>