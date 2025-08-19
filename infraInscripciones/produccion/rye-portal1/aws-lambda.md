<h1 align="center">
    <br>
    Configuracion de una funcion lambda en AWS
    <br>
</h1>


## Creacion de funcion lambda

### Buscar el servicio AWS LAMBDA

![lambda](https://user-images.githubusercontent.com/20384738/138913328-ebe4d327-f3ed-4032-acad-1062181f326c.png)

### Datos de la funcion
 1. Ingresar nombre de la funcion
 2. Ingresar el lenguaje de programacion a utilizar
 2. Configurar la arquitectura 

![image](https://user-images.githubusercontent.com/20384738/138913700-7524fbe4-5f53-400e-93d5-089cb492bd7b.png)

### Permisos de la funcion
> AWS Lambda permite crear un nuevo usuario, o utilizar uno ya existente. Se recomienda crear un nuevo usuario para la funcion. Para la gestion de usuarios visitar [IAM console](https://console.aws.amazon.com/iam/home?#/roles$new)

![permisos](https://user-images.githubusercontent.com/20384738/138914911-f20163fb-4f1e-4aec-9e43-24d0ec3c5ce5.png)

Despues de haber configurado la funcion lambda, darle click al boton  ```Create Function```

## Funcion Lambda
> Una funcion lambda por defecto trabaja de manera asincrona.

### Codigo
En la seccion de Code Source se puede codificar el codigo que se ejecutara una vez sea llamada la funcion.
![codigo](https://user-images.githubusercontent.com/20384738/138916085-4afd4bc2-8203-4435-b048-91dfe7597dfd.png)

### Deploy
Para hacer un deploy del codigo, solo es necesario darle click al boton ```Deploy```
![deploy](https://user-images.githubusercontent.com/20384738/138916360-61a535fd-3ee4-49e1-9f28-d6937d65f69e.png)

## Configuracion
> Para configurar la funcion lambda es necesario estar en la pestaña ```Configuration```

Se nos permite configurar muchos parametros, tales como variables de enterno, permisos del rol de la funcion lambda, vpc, entre otras.

### Timeout
> El timeout indicara a la funcion lambda cuanto es lo maximo que se puede tardar en retornar una respuesta, al exceder el tiempo, la funcion lambda retonarda un estado de error.

Para configurar el timeout es necesario estar en ```General configuration``` y darle click en ```Edit```
![timeout](https://user-images.githubusercontent.com/20384738/138917280-07a70584-58bf-4ac6-bb53-1e3ec9ac7969.png)

## Creacion API Gateway

### Buscar el servicio API Gateway
![apigateway](https://user-images.githubusercontent.com/20384738/139095190-aae97fed-493c-485a-9963-09ddbdd37e81.png)

### Tipo de API
> AWS ofrece 4 diferentes tipos de API para utilizar, para facilidades con las funciones lambda utilizaremos una de tipo REST API. [Ver mas](https://docs.aws.amazon.com/apigateway/latest/developerguide/api-gateway-basic-concept.html)

![api](https://user-images.githubusercontent.com/20384738/139096077-e780baec-e45f-45f8-b8db-5f8430280a0e.png)

### Configuracion API REST
AWS nos ofrece diferentes tipos de configuraciones, especialmente si queres crear una api de ejemplo que ellos proveen.

1. Seleccionar REST
2. Seleccionar New API
3. Ingresar nombre y descripcion de la api
4. Click en  ``` Create API  ```

![settings](https://user-images.githubusercontent.com/20384738/139097300-a66aaa7e-97f4-4c16-9e85-e0e1adae2000.png)

### Creacion de metodos
> Podemos crear diferentes tipos de metodos POST, GET, PUT, DELETE, entre otros.

1. Click en ``` Actions ```
2. Click en ``` Create Method ``` 
3. Crear un method de tipo POST

![post](https://user-images.githubusercontent.com/20384738/139097994-66fb55a2-2b19-4323-92ec-58754a489701.png)

4. Click en ```POST ```
5. En la integracion seleccionaremos Lambda Function.
6. Escoger la region donde se encuentra nuestra funcion Lambda
7. Escribimos el nombre de nuestra funcion lambda
8. Click en ``` Save ```

![lambdaConfiguracion](https://user-images.githubusercontent.com/20384738/139098419-06c09e52-793b-4d68-b2e6-5e3308adb91f.png)

### Habilitar CORS

> [Ver mas](https://developer.mozilla.org/es/docs/Web/HTTP/CORS) acerca de CORS

1. Click en ``` Actions ```
2. Click en ``` Enable CORS ```
3. Seleccionar ``` DEFAULT 4XX``` y ``` DEFAULT 5XX```

![cors](https://user-images.githubusercontent.com/20384738/139099010-b3e5a2ee-6dcb-4228-ad27-38e03f69fcbc.png)

4. Click en ``` Enable CORS and replace existing CORS headers ```
5. Click en ``` Yes, replace existing values ```

![enable-cors](https://user-images.githubusercontent.com/20384738/139099100-9e8d9aaf-dc42-495b-b7f6-54ca50547390.png)

### Deploy API

1. Click en ``` Actions ```
2. Click en ``` Deploy API ```

![deploy-api](https://user-images.githubusercontent.com/20384738/139099333-28e72f63-8042-4b23-b689-da0b4f98624c.png)

3. Crear una nueva stage y agregarle una descripcion
4. Click en ``` Deploy ```

![stage](https://user-images.githubusercontent.com/20384738/139099547-a7fc56a7-4021-40b5-81b2-382b8ad49a9c.png)

### ENDPOINT
> Luego de haber creado el stage, se nos proporcionara el endpoint donde podremos consumir nuestra
API Gateway

![endpoint](https://user-images.githubusercontent.com/20384738/139099878-770a26ea-3a89-424b-bad3-433c3f87ff09.png)

## Integracion Funcion Lambda con API Gateway
> Si hicimos todo correctamente, volvemos a dirigirnos a nuestra funcion lambda y ya deberia aparecer la integracion con API Gateway

![integracion](https://user-images.githubusercontent.com/20384738/139100332-7fb4910b-ac3a-4b83-928e-00f64390b5e3.png)

## Permisos al rol
> Es necesario gestionar los permisos dados al rol creado por la funcion lambda [IAM console](https://console.aws.amazon.com/iam/home?#/roles$new)

Los permisos necesarios para poder utilizar Rekognition desde una funcion lambda son los siguientes

![permisos](https://user-images.githubusercontent.com/20384738/139289493-54fc76db-3d27-4c57-9c5f-a2d7ed348a9a.png)

### Agregar un nuevo Permiso

1. click en ``` Attach polices ```
2. Buscar el permiso a agregar 

![roles](https://user-images.githubusercontent.com/20384738/139289770-266caac8-ea76-4a8d-8918-db04834cfb00.png)

3. click en ``` Attach policy ``` y ya estaria agregado el permiso al rol.
