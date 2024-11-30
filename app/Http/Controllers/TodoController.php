<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermission('todo-create')) {
            $todos = auth()->user()->todos()->get();
            return view('todos.index', compact('todos'));
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required|string|min:1|max:300',
            'description' => 'required|string|min:1|max:1000',
            'completed' => 'boolean:0,1,false,true',
        ]);

        $formData['completed'] = $request->has('completed');

        auth()->user()->todos()->create($formData);

        return to_route('todos.index')->with('success', 'Todo successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if (Gate::allows('edit-todo', $todo)) {
            return view('todos.show', compact('todo'));
        }

        return to_route('todos.index')->with('success', 'You not allowed to view this Todo');;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if (Gate::allows('edit-todo', $todo)) {
            return view('todos.edit', compact('todo'));
        }

        return to_route('todos.index')->with('success', 'You not allowed to edit this Todo');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        Gate::authorize('edit-todo', $todo);

        $formData = $request->validate([
            'title' => 'required|string|min:1|max:300',
            'description' => 'required|string|min:1|max:1000',
            'completed' => 'boolean:0,1,false,true',
        ]);

        $formData['completed'] = $request->has('completed');

        $todo->update($formData);

        return to_route('todos.index')->with('success', 'Todo successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        Gate::authorize('edit-todo', $todo);

        $todo->delete();

        return to_route('todos.index')->with('success', 'Todo successfully deleted');
    }
}
