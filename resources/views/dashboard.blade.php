@extends('layouts.layout')
@section('page_title')
    Dashboard
@endsection
@section('content')
<h1 class="text-center display-1 text-primary animate__animated animate__bounceInDown">Dashboard</h1>
<p class="lead text-center text-secondary animate__animated animate__fadeIn">Welcome -- <span class="text-primary">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span></p>

@endsection