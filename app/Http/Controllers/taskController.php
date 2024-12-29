<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->paginate(5);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);
    
        Task::create($validated);
    
        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        try {
            $task->is_completed = !$task->is_completed;
            $task->save();
    
            $status = $task->is_completed ? 'Finalizada' : 'Pendiente';
            $message = $task->is_completed
                ? 'La tarea ha sido marcada como Finalizada.'
                : 'La tarea ha sido marcada como Pendiente.';
            $notificationType = $task->is_completed ? 'success' : 'pending';
    
            return redirect()->route('tasks.show', $task->id)
                             ->with($notificationType, $message);
        } catch (\Exception $e) {
            return redirect()->route('tasks.show', $task->id)
                             ->with('error', 'Hubo un problema al cambiar el estado de la tarea.');
        }
    }    

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}