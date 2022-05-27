@extends('layout.base')

@section('content')
<div class="mx-auto" style="width: 400px;">
    <form>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ Auth::user()->name }}">
            </div>
          </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Email: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ Auth::user()->email }}">
          </div>
        </div>
      </form>
</div>
    


@endsection