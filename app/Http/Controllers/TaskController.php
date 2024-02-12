<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('category')->paginate(5);
        $categories = Category::has('tasks')->get();
        return Inertia::render('Tasks/index' ,[
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return Inertia::render('Tasks/Create' ,[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        if($request->validated()){
            Task::create([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id
            ]);
            return redirect()->route('home')->with([
                'message' => 'Task added successfully',
                'class' => 'alert alert-success'
            ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories = Category::all();
        return  Inertia::render('Tasks/Edit' ,[
            'categories' => $categories,
            'task' => $task
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if($request->validated()){
            $task->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'category_id' => $request->category_id,
                    'done' => $request->done,
            ]);

            return Redirect::route('home')->with([
                'message' => 'Task updated successfully',
                'class' => 'alert alert-success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with([
            'message' => 'Task deleted successfully',
            'class' => 'alert alert-success',
        ]);
    }

    public function getTasksByCategory(Category $category){
        $categories = Category::has('tasks')->get();
        $tasks = $category->tasks()->with('category')->paginate(5);
        return Inertia::render('Tasks/index' ,[
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }

    public function getTasksOrderBy($column, $direction ){
        $categories = Category::has('tasks')->get();
        $tasks = Task::with('category')->orderBy($column ,$direction )->paginate(5);
        return Inertia::render('Tasks/index' ,[
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }
}
