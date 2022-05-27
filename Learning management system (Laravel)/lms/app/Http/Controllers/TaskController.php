<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subjects $subject)
    {
        return view('tasks.create', [
            'subject_id' => $subject->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subjects $subject, Request $request)
    {
        $data = $request->validate([
            'name'        => 'between:5,20',
            'description' => 'required',
            'points'      => 'digits_between:1,1',
            ]);
        $subject->tasks()->create($data);
        return redirect()->route('subjects.show', ['id' => $subject['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //$this->authorize('access', $task);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name'        => 'between:5,20',
            'description' => 'required',
            'points'      => 'digits_between:1,1',
            ]);
        $task->update($data);
        return redirect()->route('subjects.show', ['id' => $task->subjects_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        $task->delete();
        return redirect()->route('subjects.list');
    }
}
