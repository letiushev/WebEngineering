<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\task;

class SubjectController extends Controller
{
    public function index()
    {
        //$subjects = Subjects::all();
        return view('subjects.list', [
            'subjects' => Auth::user()-> subjects,
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function show($id)
    {
        $subject = Subjects::find($id);
        $this->authorize('access', $subject);
        //dd($subject->tasks);
        return view('subjects.show', [
            'subject' => $subject,
        ]);
    }

    public function edit($id)
    {
    $subject = Subjects::find($id);
    $this->authorize('access', $subject);
    return view('subjects.edit', [
        'subject' => $subject,
        ]);
    }
    
    public function delete($id)
    {
        Subjects::destroy($id);
        
        return redirect()->route('subjects.list');
    }
    
    public function update($id, Request $request)
    {
        $validated_data = $request->validate([
            'name'        => 'between:3,20',
            'description' => 'nullable',
            //REGEX INCLUDE
            'code'        => 'starts_with:IK-',
            'credit'      => 'digits_between:1,1',
            ]);
        $subject = Subjects::find($id);
        $this->authorize('access', $subject);
        $subject->update($validated_data);
        return redirect()->route('subjects.show', ['id' => $subject->id]);
    }
    
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name'        => 'between:3,20',
            'description' => 'nullable',
            //REGEX INCLUDE
            'code'        => 'starts_with:IK-',
            'credit'      => 'digits_between:1,1',
            ]);
        $validated_data['user_id'] = Auth::id();
        Subjects::create($validated_data);
        return redirect('/subjects');
    }
}
    