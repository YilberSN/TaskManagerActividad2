<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required'
        ]);

        //Task::create($request->only('title', 'description', 'priority'));

        $request->user()->tasks()->create($request->only('title', 'description', 'priority'));

        return redirect()->route('tasks.index')->with('sucess', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required'
        ]);
        $task = Task::findOrFail($id);
        $task->update($request->only('title', 'description', 'priority'));
        return redirect()->route('tasks.index')->with('success', 'Task updted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
