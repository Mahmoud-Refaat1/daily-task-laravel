<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('dashboard', compact('tasks'));
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
        ]);
    
        // ربط المهمة بالمستخدم الحالي
        $validated['user_id'] = Auth::id();
    
        Task::create($validated);
    
        return redirect()->route('tasks.index')->with('success', 'تمت إضافة المهمة');
    }

    public function edit(Task $task)
    {
         // تأكيد أن المهمة تابعة للمستخدم الحالي
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
    
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
    
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);
    
        return redirect()->route('tasks.index')->with('updated', 'تم تعديل المهمة');
    }

    public function destroy(Task $task)
    {
        $this->authorizeTask($task);

        $task->delete();

        return redirect()->route('tasks.index')->with('deleted', 'تم حذف المهمة بنجاح');
    }

    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
