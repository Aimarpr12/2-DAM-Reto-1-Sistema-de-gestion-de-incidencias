# Sistema de Gestión de Incidencias

## Tabla de Contenidos

- [Descripción](#descripción)
- [Características](#características)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Autores](#autores)

## Descripción

Este proyecto es un **sistema de gestión de incidencias** diseñado para facilitar el seguimiento y la resolución de problemas técnicos dentro de una organización. Desarrollado como parte de un reto académico para el segundo curso de Desarrollo de Aplicaciones Multiplataforma (2 DAM), permite registrar, gestionar y resolver incidencias de manera eficiente.

## Características

- **Gestión de Usuarios**: Creación y administración de cuentas con diferentes roles.
- **Registro de Incidencias**: Registro de incidencias con detalles como descripción, prioridad y categoría.
- **Seguimiento de Incidencias**: Actualización de incidencias con comentarios y cambios de estado.
- **Notificaciones**: Envío de notificaciones a los usuarios sobre cambios en las incidencias.
- **Interfaz Intuitiva**: Interfaz web accesible y fácil de usar.

## Tecnologías Utilizadas

- **Backend**: Laravel (PHP)
- **Frontend**: Blade Templates, Bootstrap, JavaScript
- **Base de Datos**: MySQL
- **Control de Versiones**: Git
- **Contenedor**: Docker

## Requisitos del Sistema

- PHP 8.0 o superior
- Composer
- MySQL 5.7 o superior
- Docker (opcional)

## Requisitos

Para ejecutar este proyecto, necesitarás tener instalados los siguientes componentes:

- **Java Development Kit (JDK)** 11 o superior.
- **IDE compatible con Java**, como IntelliJ IDEA o Eclipse.
- **Base de datos MySQL o PostgreSQL** para almacenar las incidencias.
- **Maven** para gestionar las dependencias del proyecto.

## Instalación

### Paso 1: Clonar el repositorio

```bash
git clone https://github.com/Aimarpr12/2-DAM-Reto-1-Sistema-de-gestion-de-incidencias.git
cd 2-DAM-Reto-1-Sistema-de-gestion-de-incidencias
```

### Paso 2: Instalar dependencias

```bash
composer install
```
### Paso 3: Configurar el archivo .env

Copia el archivo .env.example a .env y ajusta las configuraciones de base de datos y otras variables necesarias.

```bash
cp .env.example .env
php artisan key:generate
```
### Paso 4: Migrar la base de datos

```bash
php artisan migrate
```

### Paso 5: Iniciar el servidor

```bash
php artisan serve
```

### Paso 6: Acceder a la aplicación

Abre el navegador y visita http://localhost:8000.

## Uso

- **Registro de usuarios**: Los usuarios deben registrarse para poder acceder a la plataforma.
- **Inicio de sesión**: Inicia sesión con las credenciales registradas.
- **Registrar una incidencia**: Rellena el formulario para crear una nueva incidencia.
- **Gestionar incidencias**: Puedes ver, actualizar y asignar las incidencias registradas.
- **Reportes y estadísticas**: Genera reportes y estadísticas para obtener una visión general de las incidencias gestionadas.


## Autores
- [Aimar Pelea](https://github.com/Aimarpr12)
- [Milena Cuellar](https://github.com/Milena2301)
