@extends('layout')
@section('content')

@if($errors->any()) 
  @foreach($errors->all() as $error)
    <div class="alert alert-danger" role='alert'>{{$error}}</div>
  @endforeach
@endif

<form action="/article" method="POST">
  @csrf
  <div class="mb-3">
    <label for="date" class="form-label">date</label>
    <input type="date" value="{{date('y-d-m')}}" class="form-control" id="date" aria-describedby="namelHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">name</label>
    <input type="name"  class="form-control" id="name" aria-describedby="namelHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">description</label>
    <input type="text" class="form-control" id="desc" aria-describedby="emailHelp" name="desc">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
