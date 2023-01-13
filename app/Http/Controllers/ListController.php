<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\User;
use App\Models\Task;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        $lists = TaskList::where('user_id', $user->id);

        $lists = $lists->paginate(8);

        return view('app.list.index', ['title' => 'Task Lists', 'lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.list.create', ['title' => 'Create Task List']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all('list', 'desc');
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        $data['user_id'] = $user->id;
        $list = TaskList::create($data);
        return redirect()->route('list.show', ['list' => $list->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  TaskList $list
     * @return \Illuminate\Http\Response
     */
    public function show(TaskList $list)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        $tasks = Task::where('user_id', $user->id)->where('list_id', $list->id)->get();

        return view('app.list.show', ['title' => $list->list, 'list' => $list, 'tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  TaskList $list
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskList $list)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        if($list->user_id == $user->id){
            return view('app.list.edit', ['title' => 'Edit', 'list' => $list]);
        } else {
            return view('app.task.access_denied', ['title' => 'Access Denied']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  TaskList $list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskList $list)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$list->user_id == $user->id){
            return view('app.task.access_denied', ['title' => 'Access Denied']);
        }

        $list->update($request->all());
        return redirect()->route('list.show', ['list' => $list]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  TaskList $list
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskList $list)
    {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        if(!$list->user_id == $user->id){
            return view('app.list.access_denied', ['title' => 'Access Denied']);
        }

        $list->delete();
        return redirect()->route('list.index');
    }
}
