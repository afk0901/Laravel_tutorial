<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    public function index(){
       
        //$tasks = DB::table('tasks')->get();//Get everything from the task table

     
    $tasks = Task::all(); //Returns all the tasks 

    $idone = Task::where('id','=', 2)->get();/*returns all with the 
    id of 2*/

    $firstone = 'AFASDFASDFJKLASDFJKLASDF';

    return view('tasks.index',compact('tasks'),compact('idone'),
    compact('firstone')
    );//Return the view with the tasks variable

    }

    public function show(Task $task){//Task find{wildcard} This query: select * from table where primarykey = '$task'; 

    	 //$task = DB::table('tasks')->find($id);//Gets the idis from the table

    //$task = Task::find($id);//elequent :) //returns all ids.


    return $task; //- Fun fact, this will actually return a json data!
  

    return view('tasks.show',compact('task'));//Return the view with the task variable
    }
}

