@extends('portalEstudiantil.layouts.master')
@section('content')
<style>
        td{
          border:1px solid rgb(97, 181, 184);
        }
        table{
            border:2px solid rgb(51, 182, 187);
            margin-left: auto;
            margin-right: auto;
            font-size: 18px;
        }
        h1{
            text-align: center;
        }
        body{
            background-color: RGB(240,240,240);
        }

        .btn_div{
            padding: 20px;
            text-align:center;
        }

        .button{
            border: none;
            background-color: #008CBA;
            color: white;
            font-size: 22px;
            padding: 16px;
            border-radius: 10px;
        }

        .button a{
            text-decoration: none;
        }

        h1{
            margin-top: 40px;
        }
        
</style>

<div class="container">
    <h1>CUOTAS ESTUDIANTILES</h1>
        <table>
            <tr>
                <th>INSCRIPCIONES</th>
                <th>Rubro</th>
            </tr>
            <tr>
                <td>Primer ingreso</td>
                <td>Q. 101.00</td>
            </tr>
            <tr>
                <td>Primer ingreso (extranjero)</td>
                <td>
                    <ul>
                        <li>Centroamericano Q. 1,800.00</li>
                        <li>Latinoamericano Q. 12,000.00</li>
                        <li>Resto del mundo Q. 24,000.00</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Reingreso</td>
                <td>
                    <ul>
                        <li>Matrícula estudiantil anual Q. 91.00</li>
                        <li>Segundo semestre Q. 61.00</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Reingreso (extranjero)</td>
                <td>
                    <ul>
                        <li>Centroamericano Q. 1,800.00</li>
                        <li>Latinoamericano Q. 12,000.00</li>
                        <li>Resto del mundo Q. 24,000.00</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>TRÁMITES</th>
                <th>Rubro</th>
            </tr>
            <tr>
                <td>Títulos</td>
                <td>
                    <ul>
                        <li>Q. 110.00 profesorado</li>
                        <li>Q. 115.00 licenciatura</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Reposición de título</td>
                <td>Q. 600.00</td>
            </tr>
            <tr>
                <td>Traslado de matrícula (2da. Vez)</td>
                <td>Q. 20.00</td>
            </tr>
        </table>
        <div class="btn_div">
            <button class="btn btn_primary" type="button">
                <a href="https://drive.google.com/file/d/17gjXRVDozJQm3UVzMBSZ7VbUSJf31mTN/view?usp=sharing" download="cuotas" target="_blank">Descargar</a>
            </button>
        </div>
        
</div>

@endsection