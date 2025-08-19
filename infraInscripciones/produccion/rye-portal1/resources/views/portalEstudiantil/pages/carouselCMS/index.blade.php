@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <br/>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-align-justify"></i> Imágenes carousel
                        <a
                            href="{{ url('/carouselCMS/create') }}"
                            role="button"
                            class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        ><i class="fas fa-plus"></i>&nbsp; Nueva imagen</a
                        >
                    </div>
                    <div class="card-block">                        
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($imagenes as $imagen)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $imagen['basename'] }}</td>
                                    <td>
                                        <div class="row no-gutters">
                                            <form method="POST" action="{{ url('/carouselCMS' . '/' . $imagen['filename'] . '.' .$imagen['extension']) }}" accept-charset="UTF-8" style="display:inline" class="col">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button
                                                    type="submit"
                                                    title="Delete"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Confirm delete?')"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal con animacion de carga --}}
    @include('common.include.loading')
@endsection

@section('javascript')
    <script type="text/javascript">

        $(document).on({
            ajaxStart: function() {
                $("#loadMe").modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false, //remove option to close with keyboard
                    show: true //Display loader!
                });
            },
            ajaxStop: function() { $("#loadMe").modal("hide"); }
        });

        function cambiarEstado(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('cms.pagina.toggle') }}",
                type:"GET",
                data: {
                    id: id
                },
                success:function(data) {
                    $('#flashMessage').html('');
                    $('#flashMessage').append("<p class=\"alert alert-success\" >"+data+"\n" +
                        "<button type=\"button\" class=\"close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">\n" +
                        "<span aria-hidden=\"true\">&times;</span>\n" +
                        "</button>\n" +
                        "</p>");
                },
                error: function (data) {
                    console.log(data);
                    $('#flashMessage').html('');
                    $('#flashMessage').append("<p class=\"alert alert-danger\" >"+data.responseJSON+"\n" +
                        "<button type=\"button\" class=\"close\" data-bs-dismiss=\"alert\" aria-label=\"Close\">\n" +
                        "<span aria-hidden=\"true\">&times;</span>\n" +
                        "</button>\n" +
                        "</p>");
                }
            });
        }
    </script>
@endsection
