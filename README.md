# 🚀Sistema Gestor de Tareas - Frontend y Backend  

## 📌Descripción  
**Tasks App** es un sistema sencillo de gestión de tareas, desarrollado con **Laravel** y **Tailwind CSS**.  

El sistema permite a los usuarios:  
- Registrarse e iniciar sesión.  
- Administrar sus tareas mediante un **CRUD completo** (crear, leer, actualizar y eliminar).  

Este proyecto es ideal como base para **aplicaciones de productividad**, **flujos de trabajo simples** o como ejemplo práctico de integración **Laravel + Vite + Tailwind CSS**.  

## 🛠️Tecnologías utilizadas  
- **PHP (Laravel 11)** – Framework backend MVC.  
- **MySQL** – Base de datos relacional.  
- **Tailwind CSS** – Estilos modernos y responsivos.  
- **Vite** – Bundler rápido para frontend y assets.  
- **XAMPP** – Servidor local (Apache + MySQL + PHP).  

## ⚙️Instalación y ejecución  

```bash
# 1. Clonar el repositorio
git clone https://github.com/EdannyDev/tasks-app.git

# 2. Mover los archivos al directorio de XAMPP
htdocs/tasks-app

# 3. Crear una base de datos en MySQL
CREATE DATABASE tasks_db;

# 4. Configurar el archivo .env de Laravel

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_db
DB_USERNAME=root
DB_PASSWORD=

# 5. Instalar dependencias de Laravel
composer install

# 6. Ejecutar migraciones (para crear tablas de usuarios y tareas)
php artisan migrate

# 7. Levantar el servidor de Laravel
php artisan serve

# 8. La aplicación estará disponible en:
http://127.0.0.1:8000

# 9. En otra terminal, instalar dependencias de frontend y correr Vite
npm install
npm run dev

```

## ✨Características principales
- Autenticación de usuarios (registro e inicio de sesión).
- CRUD de tareas (crear, listar, editar, eliminar).
- Interfaz moderna con Tailwind CSS.
- Integración de Vite para desarrollo rápido y eficiente.
