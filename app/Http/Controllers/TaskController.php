<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
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

        return view('app.task.index', ['title' => 'Task Index','tasks' => $tasks, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_id = $request->input('list_id') ?? '';
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        $lists = TaskList::where('user_id', $user->id)->get();

        return view('app.task.create', ['title' => 'Create Task', 'lists' => $lists, 'selected_list_id' => $list_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|min:3|max:200',
            'completion_deadline' => 'required|date',
            'list_id' => 'nullable|exists:lists,id',
        ]);

        $data = $request->all('task', 'completion_deadline', 'list_id');
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        $data['user_id'] = $user->id;
        $task = Task::create($data);
        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('app.task.show', ['title' => $task->task, 'task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        if($task->user_id == $user->id){
            return view('app.task.edit', ['title' => 'Edit', 'task' => $task]);
        } else {
            return view('app.task.access_denied', ['title' => 'Access Denied']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$task->user_id == $user->id){
            return view('app.task.access_denied', ['title' => 'Access Denied']);
        }
        
        $request->validate([
            'task' => 'required|string|min:3|max:200',
            'completion_deadline' => 'required|date',
            'list_id' => 'nullable|exists:lists,id',
        ]);

        $task->update($request->all());
        return view('app.task.show', ['title' => $task->task, 'task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$task->user_id == $user->id){
            return view('app.task.access_denied', ['title' => 'Access Denied']);
        }

        $task->delete();
        return redirect()->route('task.index');
    }
}
