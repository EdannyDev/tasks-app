<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fade-out {
            animation: fadeOut 4s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

        .alert {
            position: fixed;
            top: 90px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 400px;
            width: 100%;
            z-index: 50; /* Asegura que la notificación esté por encima de otros elementos */
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px; /* Espacio entre el ícono y el texto */
            font-size: 16px;
        }

        .alert-success {
            background-color: #38a169; /* Verde más fuerte */
            color: white;
        }

        .alert-error {
            background-color: #e53e3e; /* Rojo más fuerte */
            color: white;
        }
        
        .alert i {
            font-size: 20px; /* Tamaño del ícono */
        }

        .alert p {
            margin: 0; /* Eliminar el margen por defecto del párrafo */
        }

        /* Estilos del modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .modal-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            gap: 8px;
        }
        .modal-button-confirm {
            background-color: #e53e3e; /* Rojo para confirmar eliminación */
        }
        .modal-button-confirm:hover {
            background-color: #c53030; /* Rojo más oscuro */
        }
        .modal-button-cancel {
            background-color: #4a5568; /* Gris oscuro para cancelar */
        }
        .modal-button-cancel:hover {
            background-color: #2d3748; /* Gris más oscuro */
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    @include('components.navbar')

    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    <!-- Modal de Confirmación -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h2 class="text-lg font-semibold mb-4">Confirmar Eliminación</h2>
            <p>¿Estás seguro de que deseas eliminar esta tarea?</p>
            <div class="modal-buttons">
                <button id="confirmDelete" class="modal-button modal-button-confirm">
                    <i class="fas fa-trash"></i>
                    Eliminar
                </button>
                <button id="cancelDelete" class="modal-button modal-button-cancel">
                    <i class="fas fa-times"></i>
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <script>
        function openModal(actionUrl) {
            document.getElementById('deleteModal').style.display = 'flex';
            const confirmDeleteButton = document.getElementById('confirmDelete');
            if (confirmDeleteButton) {
                confirmDeleteButton.setAttribute('data-url', actionUrl);
            } else {
                console.error('Confirm Delete button not found');
            }
        }

        document.getElementById('confirmDelete').addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            if (url) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        });

        document.getElementById('cancelDelete').addEventListener('click', function() {
            document.getElementById('deleteModal').style.display = 'none';
        });

        window.onclick = function(event) {
            if (event.target === document.getElementById('deleteModal')) {
                document.getElementById('deleteModal').style.display = 'none';
            }
        }
    </script>
</body>
</html>