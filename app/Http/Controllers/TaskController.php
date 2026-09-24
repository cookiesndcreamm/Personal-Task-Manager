<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        //
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update()
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }

    public function updateStatus()
    {
        //
    }
}