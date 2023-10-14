@extends('layouts.layout')

@section('page_title')
    Login
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm col-md col-lg col-xl"></div>
      <div class="col-sm col-md col-lg col-xl mt-5">
          <main class="form-signin w-100 m-auto">
              <h1 class="h3 mb-3 fw-bold fs-1 text-primary">Sign In</h1>
              @if (isset($_GET['msg']))
                <p id="msg" class="text-center {{$_GET['color']}}">{{$_GET['msg']}}</p>
              @endif
              <form action="{{route('login.process')}}" method="POST">
                  @csrf
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mt-2">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign in</button>
              </form>
          </main>
      </div>
      <div class="col-sm col-md col-lg col-xl"></div>
    </div>
  </div>
@endsection