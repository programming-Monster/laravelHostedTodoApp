<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo)
    {
        // dd($todoId);
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
       $this->validate(request(),[
           'name'=>'required |min:5|max:13',
           'description' => 'required',
       ]);
        // dd(request()->all());
        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->completed = false;

        $todo->save();

        Session::flash('success', 'Todo Created Successfully.');

        return redirect('/todos');
    }

    public function edit(Todo $todo){
        // $todo = Todo::find($todoId);
        // $data = request()->all();
        
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo){
        $this->validate(request(),[
            'name'=>'required |min:5|max:13',
            'description' => 'required',
        ]);
        
        $data = request()->all();

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->completed = false;

        $todo->save();

        session()->flash("success", "Todo updated successfully");

        return redirect('/todos');

    }

    public function delete(Todo $todo){
        $todo->forceDelete();
        session()->flash("success", "Todo deleted successfully");
        return redirect('/todos');
    }

    public function completed(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash("success", "Todo completed successfully");
        return redirect('todos');
    }
    
};

