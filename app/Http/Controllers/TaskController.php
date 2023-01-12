<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        
        $search = $request->search ?? '';
        $order = $request->orderby ?? 'created_at';
        
        $tasks = Task::where('user_id', $user->id);
        
        if($search) {
            $tasks = $tasks->where('task', 'like', "%$search%");
        }
        if($order) {
            $tasks = $tasks->orderBy($order);
        }
        $tasks = $tasks->paginate(8)->appends(request()->except(['page']));

        return view('app.list', ['title' => 'Task List','tasks' => $tasks, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.create', ['title' => 'Create Task']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all('task', 'completion_deadline');
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        $data['user_id'] = $user->id;
        $task = Task::create($data);
        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('app.show', ['title' => $task->task, 'task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        if($task->user_id == $user->id){
            return view('app.edit', ['title' => 'Edit', 'task' => $task]);
        } else {
            return view('app.access_denied', ['title' => 'Access Denied']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$tarefa->user_id == $user->id){
            return view('app.access_denied', ['title' => 'Access Denied']);
        }

        $task->update($request->all());
        return view('app.show', ['title' => $task->task, 'task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$tarefa->user_id == $user->id){
            return view('app.access_denied', ['title' => 'Access Denied']);
        }

        $tarefa->delete();
    }
}
