@extends('layouts.app')

@section('title', 'Registro de Tareas')

@section('content')
    <div class="mt-16"> <!-- Añade aquí el margen superior -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Lista de Tareas</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="fade-out alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Mensaje de error -->
        @if(session('error'))
            <div class="fade-out alert alert-error">
                <i class="fa-solid fa-circle-xmark"></i>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <!-- Formulario de búsqueda y botón de crear -->
        <div class="flex justify-between items-center mb-6">
            <form action="{{ route('tasks.index') }}" method="GET" class="flex items-center space-x-4">
                <input type="text" name="search" placeholder="Buscar tareas" value="{{ request()->query('search') }}" class="w-64 p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">Buscar</button>
            </form>

            <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition flex items-center space-x-2">
                <i class="fa-solid fa-list-check"></i>
                <span>Agregar Tarea</span>
            </a>
        </div>

        <!-- Tabla de tareas -->
        <table class="min-w-full bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="py-2 px-4 border-b border-gray-200 rounded-tl-lg">Título</th>
                    <th class="py-2 px-4 border-b border-gray-200">Descripción</th>
                    <th class="py-2 px-4 border-b border-gray-200">Estado</th>
                    <th class="py-2 px-4 border-b border-gray-200 rounded-tr-lg">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center">{{ $task->title }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $task->description }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            @if($task->is_completed)
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Finalizada</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">Pendiente</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center flex justify-center space-x-2">
                            <!-- Botón "Ver Detalles" -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Botón "Editar" -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <!-- Botón "Eliminar" -->
                            <button onclick="openModal('{{ route('tasks.destroy', $task->id) }}')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 px-4 text-center border-b">No hay tareas disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación con botones -->
        <div class="flex justify-center mt-6">
            <div class="flex items-center space-x-2">
                <!-- Botón "Anterior" -->
                @if ($tasks->onFirstPage())
                    <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg cursor-not-allowed" disabled>Anterior</button>
                @else
                    <a href="{{ $tasks->previousPageUrl() }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">Anterior</a>
                @endif

                <!-- Botón "Siguiente" -->
                @if ($tasks->hasMorePages())
                    <a href="{{ $tasks->nextPageUrl() }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">Siguiente</a>
                @else
                    <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg cursor-not-allowed" disabled>Siguiente</button>
                @endif
            </div>
        </div>
    </div>
@endsection