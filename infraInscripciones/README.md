Entrar al contenedor utilizando docker exec -it "nombre_contenedor" bash

Correr el comando:

    chmod -R 777 /var/www/html

Ingresar a consola de db_inscripcion con el siguiente comando:

    docker exec -it db_inscripcion bash

El password de root es 123456

Entrar a consola mysql con:

    mysql -u root -p

Crear el usuario siguiente:

    CREATE USER 'ryeusac'@'%' IDENTIFIED BY '123456';

Ingresar el siguiente comando:

    ALTER USER 'ryeusac'@'%' IDENTIFIED WITH mysql_native_password by '123456';

Darle privilegios:

    GRANT ALL PRIVILEGES ON *.* TO 'ryeusac'@'%';
    FLUSH PRIVILEGES;


# POSTGRESL:


Colocar el backup dentro de la carpeta encuesta

desde una terminal correr el comando:

    docker exec -it db_encuesta bash

Ingresar a consola de postgresql

Crear rol:

    CREATE ROLE limesurvey with login encrypted password '123456';

Restaurar la base de datos:

     pg_restore -U postgres -d encuestas "/var/lib/postgresql/data/dump-encuestas-202009231711.sql"




