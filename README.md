
# API de Gestión Hotelera

Este proyecto es una API de gestión hotelera desarrollada con Laravel 10, PHP 8.2.27 y PostgreSQL.

## Requisitos

1. **PHP**: 8.2.27 o superior
2. **Laravel**: 10.x
3. **PostgreSQL**: Base de datos para la aplicación

## Instrucciones para el desarrollo

### 1. Clonar el repositorio

Primero, clona este repositorio en tu máquina local:

```bash
git https://github.com/Stivenson02/LaravelApiHotel.git
cd LaravelApiHotel
```

### 2. Instalar Composer

Este proyecto usa **Composer** para gestionar las dependencias de PHP. Si no tienes Composer instalado, sigue los pasos a continuación para instalarlo.

#### Para Windows:

1. Descarga el instalador de Composer desde el sitio oficial: [Composer Windows Installer](https://getcomposer.org/Composer-Setup.exe)
2. Ejecuta el instalador y sigue las instrucciones en pantalla.

#### Para macOS / Linux:

1. Abre una terminal y ejecuta los siguientes comandos:

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Esto instalará Composer globalmente en tu máquina.

### 3. Instalar las dependencias del proyecto

Una vez que Composer esté instalado, puedes instalar las dependencias del proyecto ejecutando:

```bash
composer install
```

### 4. Configuración de la base de datos

Antes de continuar, asegúrate de tener PostgreSQL instalado en tu máquina. Si no tienes PostgreSQL, puedes descargarlo desde [PostgreSQL Official](https://www.postgresql.org/download/).

1. Crea una base de datos en PostgreSQL para el proyecto.

2. Copia el archivo `.env.example` a `.env`:

```bash
cp .env.example .env
```

3. Abre el archivo `.env` y configura la conexión a la base de datos de la siguiente manera (reemplaza con los datos correspondientes de tu base de datos):

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

Asegúrate de crear la base de datos en PostgreSQL antes de continuar.

### 5. Ejecutar migraciones

Las migraciones son necesarias para crear las tablas en tu base de datos. Para correr las migraciones, ejecuta el siguiente comando:

```bash
php artisan migrate
```

### 6. Cargar datos iniciales (Seeds)

Se cuenta con información base necesaria para la correcta ejecución del API. Esta información está incluida en los seeders, por lo que es indispensable ejecutarlos. Para correr los seeders, usa el siguiente comando:

```bash
php artisan db:seed
```

### 7. Iniciar el servidor de desarrollo

Una vez que hayas configurado la base de datos y ejecutado las migraciones y seeds, puedes iniciar el servidor de desarrollo con el siguiente comando:

```bash
php artisan serve
```

Esto iniciará el servidor en `http://127.0.0.1:8000`, y podrás comenzar a interactuar con la API.

## Comandos útiles

- **Ejecutar migraciones**: `php artisan migrate`
- **Ejecutar seeds**: `php artisan db:seed`
- **Iniciar servidor**: `php artisan serve`