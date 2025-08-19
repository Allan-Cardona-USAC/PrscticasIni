@extends('layouts.master')



@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')

<div class='row justify-content-center'>
<div class="col-xl-6">
<div class="card mb-3">
    <div class="card-header">
        <h3 style="text-align: center;">Panel de Busqueda | Certificación Titulos</h3>
    </div>
    <div class="card-body">
        <form method="get" action="{{ route('administrativo.obtenerTitulos') }}" class="container-fluid" id="form">
            {{ csrf_field() }}
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-6" style="text-align: center;">
                    <label for="registroAcademico">Registo Académico</label>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-6">
                    <input style="text-align: center;" class="form-control me-2 mr-2  mt-2 mt-md-0" type="number" id="registroAcademico" aria-label="Search" name="registroAcademico" required>
                </div>
            </div>
            <br/>
            <div class="form-row justify-content-center">
                <div class="col-12 col-lg-3">
                    <input type="submit" class="btn btn-primary w-100 mt-2 mt-md-0" value="Busqueda" onclick="verifica()">
                </div>
            </div>
        </form>
        <br/>
        @if($errors->any())
        <div class="form-row justify-content-center alert alert-danger" role="alert">
        {{$errors->first()}}
        </div>
        @endif
    </div>
</div>
</div>
</div>

@endsection

@section('javascript')

<script src="https://unpkg.com/sweetalert2@11.0.20/dist/sweetalert2.all.js">
</script>

<script>

window.onpageshow = function(event) {
        Swal.close()
};

    async function verifica() {


        let carnet = $("#registroAcademico").val();
        console.log(carnet);

        let formData = new FormData();
        formData.append('carnet', carnet)
        console.log(formData);

        event.preventDefault();

        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('administrativo.verificarCarnetTitulo')}}",
            data: formData,
            success: function(data) {
                switch (data.statusCode) {
                    case 500: {
                        console.log(data)
                        Swal.close()
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El carnet no existe',
                        })
                        return;
                    }
                }
                $("#form").submit();
                Swal.fire({
                    title: 'Espera un momento!',
                    html: 'Estamos obteniendo los datos....',
                    allowOutsideClick: false
                })
                swal.showLoading();
                
            },
            error: function(data) {

                console.log(data)
                Swal.close()
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'error al establecer contacto con el servidor',
                })
            }
           
        })
    }
</script>
@endsection