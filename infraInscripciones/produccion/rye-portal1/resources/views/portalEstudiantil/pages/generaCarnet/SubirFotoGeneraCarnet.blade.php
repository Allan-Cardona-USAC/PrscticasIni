@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
@endsection

@section('content')
<html lang="es">

    <style type = "text/css">

         h2{
            text-align: center;
         }

      </style>

      <script type="text/javascript">
      function ValidarFoto(){
          var imagen = document.getElementById("foto_perfil").getAttribute("src");
          if(imagen !== "https://registro.usac.edu.gt/images/Carne/SinFoto.jpg"){
              alert("Si la fotograf\u00EDa que subi\u00F3 no cumple con los requisitos ser\u00E1 eliminada y anulado su tr\u00E1mite de impresi\u00F3n.");
              window.location.href= "{{ url('estudiante/PerfilgeneraCarnet') }}";
          }
          else{
              alert("Debe incluir una fotograf\u00EDa antes de continuar.");
          }
      }
      </script>

   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
      <title>Perfil del Estudiante </title>
   </head>

   <body bgcolor="#F8F8FF">
       <div align="center">
       <div align="center" style = "width: 1000px; border: solid 1px #333333;">
        <form action="Upload.php" method="post" enctype="multipart/form-data">
             <h1 style="color:#006994; font-family: Tahoma; font-size: xx-large;">Actualizaci&oacute;n de foto</h1>
             <h3>
                 {{ Auth::guard('estudiante')->user()->getNombreCompleto() }}
             </h3>

            <h5>
                CUI/PASAPORTE:
                @if(Auth::guard('estudiante')->user()->cod_nac == 30)
                  {{ Auth::guard('estudiante')->user()->cui }}
                @else
                  {{ Auth:guard('estudiante')->user()->numero_pasaporte}}
                @endif
            </h5>

            <h5>
                Registro Acad&eacute;mico:
                {{ Auth::guard('estudiante')->user()->carnet }}
            </h5>

            <img src="http://registro.usac.edu.gt/images/Carne/{{$carnetmd5}}.jpg" height="300" width="200" border="0" class="img-thumbnail rounded w-30" id="foto_perfil"/>


        <script>
            function cargarImagenes(){
                var img1 = document.getElementById('foto_perfil');
                img1.onerror = cargarImagenPorDefecto;


                var imagen = document.getElementById("foto_perfil").getAttribute("src");

                if(imagen !== "http://registro.usac.edu.gt/images/Carne/SinFoto.jpg")
                    alert("Si la fotograf\u00EDa que subi\u00F3 no cumple con los requisitos ser\u00E1 eliminada y anulado su tr\u00E1mite de impresi\u00F3n.");
                    window.location.href= "{{ url('estudiante/PerfilgeneraCarnet') }}";
                } else{
                    alert("Debe incluir una fotograf\u00EDa antes de continuar.");
                }
            }

            function cargarImagenPorDefecto(e){
                e.target.src= 'http://registro.usac.edu.gt/uimages/Carne/SinFoto.jpg';
            }
            cargarImagenes();

        </script>


        <br/>
        <table>
            <tr>
              <td align="center">
                <h4>Requisitos de la fotograf&iacute;a: </h4>
                <p>
                  - No debe de exceder los 1MB.<br/>
                  - La extensi&oacute;n de la foto es JPG (.jpg).<br/>
                  - La fotograf&iacute;a debe ser reciente, es decir, no tener m&aacute;s de 6 meses de antig&uuml;edad<br/>
                  - Debe ser de rostro completo, de frente y con ojos abiertos (No Selfie).<br/>
                  - La cabeza y la parte superior de los hombros deben ocupar entre el 70 y el 80% de la fotograf&iacute;a.<br/>
                  - Ha de ser en color, centrada y enfocada.<br/>
                  - Los ojos deben estar abiertos, no rojos por el efecto del flash y no cubiertos por el pelo. <br/>
                  - Si usa lentes, los lentes deben ser de cristales claros y tener una armadura no muy gruesa. <br/>
                  - No debe incluir lentes oscuros, sombrero o gorra.<br/>
                  - Tome la foto con un fondo blanco o con un fondo casi-blanco.<br/>
                  - Evite sombras sobre el rostro o en el fondo.<br/>
                  - El rostro en la foto debe tener una expresi&oacute;n normal (boca cerrada).<br/>
                  - El contraste y la luz en la foto deben ser normales.<br/>
                <br/>
                </p>
              </td>
            <tr>
            <tr>
              <td align="center">
                <h4>Seleccione la imagen: </h4>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </td>
              <tr>
                <td align="center">
                  <br/>
                  <input type="submit" value="Subir Imagen" name="subirImagen" style="background-color: #006994; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;">
                </td>
              </tr>
              </form>

              <br/>
              <tr>
                <td align="center">
                  <input type="hidden" name="operacion" value="1" />
                  <input type = "button" onClick="ValidarFoto()" value="Aceptar y Continuar" style="background-color: #718e3f; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;"><br />
                </td>
              </tr>
            </tr>
        </table>

      </div>
           </div>
   </body>

</html>
@endsection
