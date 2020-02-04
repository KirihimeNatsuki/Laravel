<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;

class ListUsers extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('listeUsers', ['users' => $users]);
    }
    
    public function showByUserId()
    {
        $skills = Skill::all();

        return view('listeUsers', ['skill_user' => $skills]);
    }
    
    /*public function index(TaskRepository $taskRepo)
    {
        $tasks = $taskRepo->getAll();
        return view('tasks.list', [
            "taskList" => $tasks
        ]);
    }
    
    public function showByUserId(Task $task)
    {
        return view('tasks.showByUserId', [
            "task" => $task]);
        
    }*/
}
