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
                        <i class="fas fa-align-justify"></i> Categorias
                        <a
                            href="{{ url('/categoriaCMS/create') }}"
                            role="button"
                            class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        ><i class="fas fa-plus"></i>&nbsp; Nueva Categoria</a
                        >
                    </div>
                    <div class="card-block">
                        <form method="GET" action="{{ url('/categoriaCMS') }}" accept-charset="UTF-8" role="search">
                        <div class="row justify-content-md-between">
                            <div class="col col-lg-7 col-xl-5 form-group">
                                <div class="input-group">
                                    <input placeholder="Search" class="form-control" />
                                    <span class="btn-group input-group-btn"
                                    ><button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>&nbsp; Buscar
                                    </button></span
                                    >
                                </div>
                            </div>
                            <div class="col-sm-auto form-group ">
                                <select class="custom-select"
                                ><option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="100">100</option></select
                                >
                            </div>
                        </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th><th>ID</th><th>Nombre</th><th>FechaCreacion</th><th>Activado</th><th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categoriaCMS as $categoria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categoria->idCategoria }}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>{{ $categoria->fechaCreacion }}</td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    name="customSwitch"
                                                    @if($categoria->estado == 1)
                                                    checked
                                                    @endif
                                                    onchange="cambiarEstado('{{ $categoria->idCategoria }}')"
                                                />
                                                <label class="custom-control-label" for="customSwitch1">
                                                    @if($categoria->estado == 1)
                                                        Activado
                                                    @else
                                                        Desactivado
                                                    @endif
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a
                                                        href="{{ url('/categoriaCMS/' . $categoria->idCategoria . '/edit') }}"
                                                        title="Edit Categoria"
                                                        role="button"
                                                        class="btn btn-sm btn-spinner btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                                <form
                                                    method="POST"
                                                    action="{{ url('/categoriaCMS' . '/' . $categoria->idCategoria) }}"
                                                    accept-charset="UTF-8"
                                                    style="display:inline"
                                                    class="col"
                                                >
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
                        <div class="pagination-wrapper"> {!! $categoriaCMS->appends(['search' => Request::get('search')])->render() !!} </div>
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
                url: "{{ route('cms.categoria.toggle') }}",
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
