@extends('portalEstudiantil.layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{!! htmlScriptTagJsApi(['es-419']) !!}
@endsection
@section('content')

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>

<div class="container">
    <div class="py-5">
        <div class="card border-dark mb-3">
            <h3 class="card-header" align="center">Solicitar Usuario</h3>
            <div class="card-body text-dark">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @include ('portalAdministrativo.solicitud-usuario.solicitudExterna.formExterno')
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $('#refresh').click(function(){
            $.ajax({
                type:'GET',
                url:'refreshcaptcha',
                success:function(data){
                    $(".captcha span").html(data);
                }
            });
        });
    </script>
@endsection
