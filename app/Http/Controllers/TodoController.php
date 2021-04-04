<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index');
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);
        
        $rules = [ 'title' => 'required|max:255'];
        $messages = [
            'title.max' => 'Todo title should not be greater than 255 characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
        {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }
    public function edit()
    {
        return view('todos.edit');
    }
}
