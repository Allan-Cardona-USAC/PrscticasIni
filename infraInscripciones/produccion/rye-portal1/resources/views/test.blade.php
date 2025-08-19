<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba de Conexion</title>
</head>
<body>
    <div class="content mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Hola</h1>
            </div>
        </div>
    </div>
    @if ($test)
        <p>Hola Test Es Verdadero</p>        
    
    @else 
        <p> Holla Test es Falso</p>
    @endif
    <label for="password">SA</label>
    <input type="password">
    <a href="http://google.com.gt">Enviar a Google</a>
</body>
</html>