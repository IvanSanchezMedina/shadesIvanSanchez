
## Prueba Tecnica para Shades : IVAN ULISES SANCHEZ MEDINA

La aplicacion fue desarrollada en Laravel 8, 
A continuacion dependencias utilizadas.

- Laravel Passport.(para webService)
- CND del tailwind (para modal.)
- Laravel Breeze (para autenticacion).


- ## Prueba Técnica - PHP

Archivo con informacion y pruebas

app/Http/Controllers/PruebaTecnicaController


## Actualizacion de dependencia

Ejecutar siguientes comandos

```
npm install
```


```
composer update
```

## Configuraciones de env


Configurar entorno de base de datos (segun entorno)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shades
DB_USERNAME=root
DB_PASSWORD=

```

## Migraciones

Migrar base de datos con el siguiente comando

```
php artisan migrate
```

## Storage

linkear storage para guardar archivos

```
php artisan storage:link
```

## Ejecutar aplicacion

ejecutar siguiente comando

```
php artisan serve

```

**Endpoint para WebService:**

Se encuentran en route/api

Ejemplo de consulta:

- http://127.0.0.1:8001/api/user/update?id=12&name=Antonio

Con virtualHost

-  http://shades.local/api/user/update?id=12&name=Antonio

**Informacion de contacto:**

Ivan Ulises Sanchez Medina
922 120 4331
ivanusanchezm@gmail.com

