@extends('layout.base')

@section('content')

  <div class="container py-3">
    <h2>Task name: {{$task->name}}</h2>
    <p>{{$task->description}}</p>
    <p>Points: {{$task->points}}</p>
    <p>Number of submitted solutions: </p>
    <p>Number of evaluated solutions: </p>
    <p>Created at: {{$task->created_at}}</p>
    <p>Updated at: {{$task->updated_at}}</p>
    <a href="{{ route('tasks.edit', ['task' => $task['id']]) }}" class="btn btn-secondary">Edit</a>


    <div class="container py-3">
      <h4>Solutions: </h4>
      <ul class="list-group">
        @foreach ($task->solutions as $solution) 
          <li href="#" class="p-3 mb-2 bg-light text-dark">
            <p class="d-flex justify-content-between align-items-center">
              <span>
                Student name. Student email. 
                {{$solution->created_at}} 
                {{$solution->description}}
              </span>
              <span class="badge badge-primary badge-pill">Not evaluated</span>
            </p>
            <a href="{{ route('solutions.edit', ['solution'=>$solution->id]) }}" class="btn btn-info">Evaluate</a>
          </li>
        @endforeach
      </ul>
    </div>
    
    
    
    

@endsection