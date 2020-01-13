# SuperHeroes
Visor de SuperHeroes

# Instalación
Todo el visor fue desarrollado con el framework **Laravel**
Se requiere instalar entonces en el equipo composer, MySQL, PHP

## Instalación de dependencias
Una vez se tiene instalado composer, dentro de la carpeta del proyecto ejecutar el comando `composer install` que instalará todas las dependencias necesarias

## Generación de key
La aplicación puede necesitar un key, para esto ejecutar dentro de la carpeta del proyecto `php artisan key:generate`

## Base de datos
Para este proyecto que usar MySQL, es necesario crear una base de datos con el nombre `superheroes` y crear un usuario el cual tenga completo acceso a la base de datos con el nombre de usuario: `chef` y contraseña `chef`. Este usuario debe tener total acceso sobre esta base de datos.

## Migraciones 
Ejecutar dentro de la carpeta del proyecto `php artisan migrate --seed`, de está forma se creará las tablas necesarias para el proyecto.

## Restaurar base de datos
Dentro del repositorio el archivo `superheroes.csv` contiene toda la información a importar en la tabla superheroes creada en la migración anterior, se debe importar toda está información del archivo a dicha tabla.

## Ejecución de aplicación
 
Ejecutar `php artisan serve`