<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    function todo(){
        return view('todo.todo');
    }
    function addtask(Request $request){
        $name = $request->input('task');
        $select_task = DB::select('select todolist_name from todolist where todolist_name = ?',[$name]);
        $todos = DB::select('select * from todolist');
        if(!$select_task){
            $insert_task = DB::insert('insert into todolist(todolist_name) values(?)', [$name]);
            if($insert_task){
                $todos = DB::select('select * from todolist');
                return view('todo.todo',['message'=>'Task added successfully'],compact('todos'));
            }
            else{
                return view('todo.todo',['message'=>'Failed to add task']);
            }

        }
        else{
            return view('todo.todo',['message'=>'Task already exists'],compact('todos'));
        }
       
        
    }

    function deletetask($id){
        $delete_task = DB::delete('delete from todolist where todolist_id = ?',[$id]);
        if($delete_task){
            $todos = DB::select('select * from todolist');
            return view('todo.todo',['message'=>'Task deleted successfully'],compact('todos'));
        }
        else{
            return view('todo.todo',['message'=>'Failed to delete task']);
        }
    }
}
