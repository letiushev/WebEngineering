@extends('layout.base')

@section('content')

  <div class="container py-3">
    <h2>Subject name: {{$subject->name}}</h2>
    <p>{{$subject->description}}</p>
    <p>Code: {{$subject->code}}</p>
    <p>Credits: {{$subject->credit}}</p>
    <p>Created at: {{$subject->created_at}}</p>
    <p>Updated at: {{$subject->updated_at}}</p>

    <a href="{{route('subjects.tasks.create', ['subject'=> $subject->id])}}" class="btn btn-primary">Add new task</a>
    <a href="{{ route('subjects.edit', ['id' => $subject['id']]) }}" class="btn btn-secondary">Edit</a>
    <form action="{{ route('subjects.delete', ['id' => $subject['id']]) }}" method="POST" class="d-inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-warning">Delete</button>
    </form>
    
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Task name</th>
          <th scope="col">Points</th>
        </tr>
      </thead>
      <tbody>
        <td> 
          @foreach ($subject->tasks as $task)   
          <div class="list-group">
            <a href="{{ route('tasks.show', ['task'=>$task->id]) }}" class="list-group-item list-group-item-action">{{$task->name}}</a>
          </div> 
          @endforeach
        </td>
        <td> 
          @foreach ($subject->tasks as $task)   
          <div class="list-group">
            <a class="list-group-item list-group-item-action disabled">{{$task->points}}</a>
          </div> 
          @endforeach
        </td>
      </tbody>
    </table>

@endsection