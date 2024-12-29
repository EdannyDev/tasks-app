<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 16px;
        }
        .form-textarea {
            resize: vertical;
            height: 150px;
        }
        .form-button,
        .form-button-back {
            background-color: #38a169;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-button:hover {
            background-color: #2f855a;
        }
        .form-button-back {
            background-color: #f56565;
        }
        .form-button-back:hover {
            background-color: #c53030;
        }
        .form-text {
            font-size: 14px;
            color: #4a5568;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Agregar Tarea</h1>
        <div class="form-container">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <label for="title" class="form-label">Título:</label>
                <input type="text" id="title" name="title" class="form-input" required>
                
                <label for="description" class="form-label">Descripción:</label>
                <textarea id="description" name="description" class="form-textarea"></textarea>
                
                <p class="form-text">Estado: <strong>Pendiente</strong></p>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="form-button">
                        <i class="fas fa-save"></i>
                        Guardar
                    </button>
                    <a href="{{ route('tasks.index') }}" class="form-button form-button-back">
                        <i class="fas fa-arrow-left"></i>
                        Regresar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>