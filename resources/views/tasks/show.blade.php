<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .details-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
            text-align: center;
        }
        .details-text {
            font-size: 16px;
            margin-bottom: 12px;
        }
        .form-button,
        .form-button-back {
            color: white;
            padding: 6px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }
        .form-button-status-completed {
            background-color: #38a169; /* Verde para completada */
        }
        .form-button-status-completed:hover {
            background-color: #2f855a; /* Verde más oscuro para hover */
        }
        .form-button-status-pending {
            background-color: #f6ad55; /* Amarillo oscuro para pendiente */
        }
        .form-button-status-pending:hover {
            background-color: #dd6b20; /* Amarillo más oscuro para hover */
        }
        .form-button-back {
            background-color: #cbd5e0; /* Gris más oscuro */
            color: #4a5568;
            width: 160px; /* Ajustado el ancho específico */
        }
        .form-button-back:hover {
            background-color: #a0aec0; /* Gris más oscuro para hover */
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        /* Estilos para las notificaciones */
        .notification {
            position: fixed;
            top: 16px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 400px;
            width: 100%;
            padding: 8px 16px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            z-index: 50;
            transition: opacity 0.3s ease-in-out;
        }
        .notification-success {
            background-color: #38a169; /* Verde para éxito */
            color: white;
        }
        .notification-error {
            background-color: #e53e3e; /* Rojo para error */
            color: white;
        }
        .notification-pending {
            background-color: #f6ad55; /* Amarillo para pendiente */
            color: white;
        }
        .notification i {
            font-size: 20px; /* Tamaño del ícono */
        }
        .notification p {
            margin: 0; /* Eliminar el margen por defecto del párrafo */
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container">
        <h1 class="details-title">Detalles sobre la Tarea</h1>
        <p class="details-text"><strong>Título:</strong> {{ $task->title }}</p>
        <p class="details-text"><strong>Descripción:</strong> {{ $task->description }}</p>
        <p class="details-text"><strong>Estado:</strong> {{ $task->is_completed ? 'Finalizada' : 'Pendiente' }}</p>

        <!-- Botones para cambiar el estado y volver a la lista -->
        <div class="button-group mt-4">
            <!-- Formulario para cambiar el estado de la tarea -->
            <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" class="mr-2">
                @csrf
                @method('PATCH')
                <button type="submit" class="form-button {{ $task->is_completed ? 'form-button-status-pending' : 'form-button-status-completed' }}">
                    <i class="fas {{ $task->is_completed ? 'fa-undo' : 'fa-check-circle' }}"></i>
                    {{ $task->is_completed ? 'Marcar como Pendiente' : 'Marcar como Finalizada' }}
                </button>
            </form>

            <!-- Botón para volver a la lista -->
            <a href="{{ route('tasks.index') }}" class="form-button form-button-back text-center">
                <i class="fas fa-arrow-left"></i>
                Volver a la lista
            </a>
        </div>
    </div>

    <!-- Notificaciones -->
    @if(session('success'))
        <div class="notification notification-success fade-out">
            <i class="fas fa-check-circle"></i>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="notification notification-error fade-out">
            <i class="fas fa-times-circle"></i>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if(session('pending'))
        <div class="notification notification-pending fade-out">
            <i class="fas fa-exclamation-circle"></i>
            <p>{{ session('pending') }}</p>
        </div>
    @endif

    <script>
        // Controlar la desaparición automática de las notificaciones
        document.addEventListener('DOMContentLoaded', () => {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.style.opacity = '0';
                }, 4000); // Tiempo en milisegundos antes de desaparecer
            });
        });
    </script>
</body>
</html>