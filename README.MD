# URL SHORTENER

Este proyecto ha sido construido con Symfony 7. Permite acortar URL largas de enlaces externos a una corta aleatoria o personalizada. Funciona con urls externas.

## Características

* los usuarios registrados pueden crear URLs cortas y pueden personalizarlas si quieren.
* cada vez que se accede a una url se contabiliza y queda registrado en la base de datos.

## Construido con

* Simfony 7
* Doctrine ORM
* mysql
* bootstrap
* Twig


## Puesta en marcha

1- PRIMERO CLONA EL REPOSITORIO Y INSTALA COMPOSER:
https://github.com/monalfu/url_shortener.git
$ composer install


2- CREA UNA BASE DE DATOS. Deberás crear en la base de datos un usuario con una contraseña. Puedes usar el archivo sql prueba_profe.sql

$ php bin/console doctrine:database:create


3- CONFIGURA EN EL ARCHIVO .env TU BASE DE DATOS CON TU USUARIO Y CONTRASEÑA

DATABASE_URL="mysqli://usuar:contraseña@localhost:3306/prueba_profe"

4- REALIZA LA MIGRACIÓN:

$ php bin/console doctrine:migrations:migrate


** PRUEBA
Lógueate y inserta una url real como por ejemplo: https://www.profe.com/es/clases-particulares-online/
Si clicas al botón se generará una url corta aleatoria de números y letras y si escribes en personalizar: clases_particulares se generará una url de dominio local. Te saldrá un aviso que se ha guardado satisfactoriamente. 
Para verificar, si introduces en el navegador: https://localhost:8000/clases_particulares  te redirigirá a la url real.

## Comentarios
El listado no está, porque me ha surgido un error que no me ha dado tiempo de resolver para poder presentar. Y ha hecho que me retrase sin poder incluir el CRUD para así poder administrar las URLs creadas por el usuario. El contador de accesos funciona, pero no es visible por el error pendiente de solucionar en el listado de urls. La autenticación se realiza mediante el login y crsf token.
Los test se realizaron de manera manual.

