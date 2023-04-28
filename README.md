# Wordpress del MNMH de versión 5.5 a 6.2

Este proyecto automatiza la creación en ambiente local de lo siguiente:

- [CLI de WordPress y WP](https://hub.docker.com/_/wordpress/)
- [phpMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)
- [MySQL](https://hub.docker.com/_/mysql/)

Contenido:

- [Requisitos](#requisitos)
- [Configuración](#configuración)
- [Instalación](#instalación)
- [Uso](#uso)

_Se debe considerar que este repositorio NO incluye la base de datos ni los archivos que por seguridad reposan en el servidor de la entidad_

## Requisitos

Últimas versiones de **Docker** y **Docker Compose** instaladas en su máquina.

Clone este repositorio o copie los archivos de este repositorio en una carpeta nueva. En el archivo **docker-compose.yml** puede cambiar la dirección IP (en caso de que ejecute varios contenedores) o la base de datos de MySQL a MariaDB.

Asegúrese de [agregar su usuario al grupo `docker`] (https://docs.docker.com/install/linux/linux-postinstall/#manage-docker-as-a-non-root-user) cuando use linux

## Configuración

Copie el entorno de ejemplo en `.env`

```
cp env.ejemplo .env
```

Edite el archivo `.env` para cambiar la dirección IP predeterminada, la contraseña raíz de MySQL y el nombre de la base de datos de WordPress.

## Instalación

Abra una terminal y `cd` a la carpeta en la que `docker-compose.yml` está guardado y ejecute:

```
docker-compose up
```

Esto crea dos nuevas carpetas al lado de su archivo `docker-compose.yml`.

- `wp-data`: se usa para almacenar y restaurar volcados de bases de datos
- `wp-app`: la ubicación de su aplicación de WordPress

Los contenedores ahora están construidos y funcionando. Debería poder acceder a la instalación de WordPress con la IP configurada en la dirección del navegador. Por defecto es `http://127.0.0.1`.

Para mayor comodidad, puede agregar una nueva entrada en su archivo de hosts.

## Uso

### Contenedores iniciales

Puede iniciar los contenedores con el comando `up` en modo daemon (agregando `-d` como argumento) o usando el comando `start`:

```
inicio de docker-compose
```

### Detención de contenedores

```
parada docker-compose
```

### Eliminación de contenedores

Para detener y eliminar todos los contenedores, use el comando `abajo`:

```
docker-componer abajo
```

Use `-v` si necesita eliminar el volumen de la base de datos que se usa para conservar la base de datos:

```
ventana acoplable-componer abajo -v
```

### Proyecto de una fuente existente

Copie el archivo `docker-compose.yml` en un nuevo directorio. En el directorio creas dos carpetas:

- `wp-data`: aquí agrega el volcado de la base de datos
- `wp-app`: aquí copia su código de WordPress existente

Ahora puede usar el comando `arriba`:

```
docker-compose up
```

Esto creará los contenedores y llenará la base de datos con el volcado dado. Puede configurar su entrada de host y cambiarla en la base de datos, o simplemente sobrescribirla en `wp-config.php` agregando:

```
define('WP_HOME','http://wp-app.local');
define('WP_SITEURL','http://wp-app.local');
```

### Creación de volcados de bases de datos

```
./exportar.sh
```

### Desarrollo de un tema

Configure el volumen para cargar el tema en el contenedor en `docker-compose.yml`:

```
volúmenes:
   - ./nombre-tema/tronco/:/var/www/html/wp-content/themes/nombre-tema
```

### Desarrollo de un complemento

Configure el volumen para cargar el complemento en el contenedor en `docker-compose.yml`:

```
volúmenes:
   - ./nombre-del-complemento/trunk/:/var/www/html/wp-content/plugins/nombre-del-complemento
```

### CLI de WP

La configuración de redacción de Docker también proporciona un servicio para usar [WordPress CLI] (https://developer.wordpress.org/cli/commands/).

Ejemplo de comando para instalar WordPress:

```
docker-compose run --rm wpcli core install --url=http://localhost --title=test --admin_user=admin --admin_email=test@example.com
```

O para enumerar los complementos instalados:

```
docker-compose run --rm wpcli lista de complementos
```

Para un uso más fácil, puede considerar agregar un alias para la CLI:

```
alias wp="docker-compose ejecutar --rm wpcli"
```

De esta manera, puede usar el comando CLI anterior de la siguiente manera:

```
lista de complementos wp
```

### phpMyAdmin

También puede visitar `http://127.0.0.1:8080` para acceder a phpMyAdmin después de iniciar los contenedores.

El nombre de usuario predeterminado es `root` y la contraseña es la misma que se proporciona en el archivo `.env`.

- Este repositorio esta basado en https://github.com/nezhar/wordpress-docker-compose
