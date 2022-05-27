@extends('layout.base')

@section('content')
  <div class="container py-3">
    <h2>New task</h2>
    <form action="{{route('subjects.tasks.store', ['subject'=> $subject_id])}}" method="POST">
      @csrf
      
      <div class="form-group">
        <label for="name">Task name</label>
        <input name = "name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder=""
          value = "{{ old('name', '') }}">
        <div class="invalid-feedback">
          The name should have at least 5 characters.
        </div>
      </div>
      
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name = "description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', '') }}</textarea>
        <div class="invalid-feedback">
          The description is required.
        </div>
      </div>

      <div class="form-group">
        <label for="points">Task points</label>
        <textarea name = "points" class="form-control @error('points') is-invalid @enderror" id="points" rows="1">{{ old('points', '') }}</textarea>
        <div class="invalid-feedback">
          Points are required.
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add new task</button>
      </div>
    </form>
  </div>
@endsection