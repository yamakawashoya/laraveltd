<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index',['todos' => $todos]);
    }

    public function add(TodoRequest $request){
        $form = $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }

    public function up(TodoRequest $request){
        $form = $request->all();
    unset($form['_token']);
    Todo::where('id', $request->id)->update($form);
    return redirect('/');
    }
        
    public function del(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}

