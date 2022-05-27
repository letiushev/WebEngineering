@extends('layout.base')

@section('content')
  <div class="container py-3">
    <h2>Edit a subject</h2>
    <form action="{{ route('subjects.update', ['id' => $subject['id']]) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Subject name</label>
        <input name = "name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder=""
          value = "{{ old('name', $subject['name']) }}">
        <div class="invalid-feedback">
          The name should have at least 3 characters.
        </div>
      </div>
      
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name = "description" class="form-control " id="description" rows="3">{{ old('description', $subject['description']) }}</textarea>
      </div>

      <div class="form-group">
        <label for="code">Subject code</label>
        <textarea name = "code" class="form-control @error('code') is-invalid @enderror" id="code" rows="3">{{ old('code', $subject['code']) }}</textarea>
        <div class="invalid-feedback">
          The code should have the following format: IK-SSSNNN, where S is a capital from the English alphabet, and N is number.
        </div>
      </div>
      
      <div class="form-group">
        <label for="credit">Credit value</label>
        <textarea name = "credit" class="form-control @error('credit') is-invalid @enderror" id="credit" rows="3">{{ old('credit', $subject['credit']) }}</textarea>
        <div class="invalid-feedback">
          The credit value should be between 0 and 9.
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Edit a project</button>
      </div>
    </form>
  </div>
@endsection