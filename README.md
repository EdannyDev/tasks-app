🚀Sistema Gestor de Tareas - Frontend y Backend

📌Descripción
Tasks App es un sistema sencillo de gestión de tareas, desarrollado con Laravel y Tailwind CSS.
El sistema permite a los usuarios registrarse, iniciar sesión y administrar sus tareas con un CRUD completo (crear, leer, actualizar y eliminar).

Este proyecto es ideal como base para aplicaciones de productividad, flujos de trabajo simples o como ejemplo de integración Laravel + Vite + Tailwind CSS.

🛠️Tecnologías utilizadas
-PHP (Laravel 11) – Framework backend MVC.
-MySQL – Base de datos relacional.
-Tailwind CSS – Estilos modernos y responsivos.
-Vite – Bundler rápido para assets y frontend.
-XAMPP – Servidor local (Apache + MySQL + PHP).

⚙️Instalación y ejecución

1.-Clonar el repositorio:
git clone https://github.com/EdannyDev/tasks-app.git

2.-Mover los archivos al directorio de XAMPP (ejemplo: htdocs/tasks-app).

3.-Crear una base de datos en MySQL llamada tasks_db (o la que prefieras).

4.-Configurar el archivo .env de Laravel con tus credenciales:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_db
DB_USERNAME=root
DB_PASSWORD=

5.-Instalar dependencias de Laravel:
composer install

6.-Ejecutar migraciones (para crear tablas de usuarios y tareas):
php artisan migrate

8.-Levantar el servidor de Laravel:
php artisan serve

9.-La aplicación quedará corriendo en:
http://127.0.0.1:8000

10.-En otra terminal, correr el servidor de Vite para los estilos y assets:
npm install
npm run dev

✨Características principales
-Autenticación de usuarios (registro e inicio de sesión).
-CRUD de tareas (crear, listar, editar, eliminar).
-Interfaz moderna con Tailwind CSS.
-Integración de Vite para un desarrollo ágil.