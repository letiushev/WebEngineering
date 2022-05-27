@extends('layout.base')

@section('content')
  <div class="container">
    <div class="row">
    @foreach ($subjects as $subject)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <img src="https://sun9-36.userapi.com/impf/83FVSfmt1Vjdkf2XvENtNaK3rXohdgzrh93N5A/5-_yirJ5Zxk.jpg?size=1920x1080&quality=96&sign=ed9b922ea3401937c0557f06c87a8dc3&type=album" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$subject['name']}}</h5>
            <p class="card-text">{{$subject['code']}}</p>
            <p class="card-text"><small class="text-muted">{{$subject['credit']}}</small></p>
            <a href="{{ route('subjects.show', ['id' => $subject['id']]) }}" class="btn btn-primary">Open</a>
          </div>
        </div>
      </div>
    @endforeach
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <a href="/subjects/create" class="btn btn-secondary h-100 pt-5">Create a new subject</a>
        </div>
      </div>
    </div>
  </div>

@endsection