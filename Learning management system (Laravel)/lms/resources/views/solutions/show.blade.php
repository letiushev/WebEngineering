@extends('layout.base')

@section('content')

  <div class="container py-3">
    <p>Task description: {{$task->name}}</p>
    <p>Solution: {{$solution->description}}</p>

    <div class="container py-3">
      <form action="{{route('solutions.update', ['solution'=> $solution->id])}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label for="name">Points: </label>
          <input name = "points" type="text" class="form-control @error('points') is-invalid @enderror" id="points" placeholder=""
            value = "{{ old('points', $solution->points) }}">
          <div class="invalid-feedback">
            Evaluation mark should be between 0 and 9.
          </div>
        </div>
  
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Evaluate a solution</button>
        </div>
      </form>
    </div>

    
    
    
    
    

@endsection