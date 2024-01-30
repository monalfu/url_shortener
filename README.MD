# URL SHORTENER

Este proyecto ha sido construido con Symfony 7. Permite acortar URL largas a una corta aleatoria o personalizada. Funciona con urls externas.

## Características

* los usuarios registrados pueden crear URLs cortas y pueden personalizarlas si quieren.

## Construido con

* Simfony 7
* Doctrine ORM
* mysql
* bootstrap
* Twig


## Puesta en marcha

1- PRIMERO CLONA EL REPOSITORIO:
https://github.com/monalfu/url_shortener.git


2- CREA UNA BASE DE DATOS. Deberás crear en la base de datos un usuario con una contraseña. Puedes usar el archivo sql prueba_profe.sql

$ php bin/console doctrine:database:create


3- CONFIGURA EN EL ARCHIVO .env TU BASE DE DATOS CON TU USUARIO Y CONTRASEÑA

DATABASE_URL="mysqli://usuar:contraseña@localhost:3306/prueba_profe"

4- REALIZA LA MIGRACIÓN:

$ php bin/console doctrine:migrations:migrate



## Comentarios
El listado no está, porque me ha surgido un error que no me ha dado tiempo de resolver para poder presentar. Y ha hecho que me retrase sin poder incluir el CRUD para así poder administrar las URLs creadas por el usuario.

