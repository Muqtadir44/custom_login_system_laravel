@extends('layouts.layout')

@section('page_title')
    Settings
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="card mb-3 shadow-sm border-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm col-md col-lg">
                            <h5 class="card-title display-6 text-primary">Update Profile</h5>
                            <p class="card-text"></p>
                            <form action="/setting.post.picture" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror " id="floatingInput" value="{{auth()->user()->first_name}}" name="first_name" placeholder="First Name">
                                    <label for="floatingInput">First Name</label>
                                    <p class="form-label text-danger">
                                        @error('first_name')
                                            {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror " name="last_name" value="{{auth()->user()->last_name}}" id="floatingPassword" placeholder="Last Name">
                                    <label for="floatingPassword">Last Name</label>
                                    <p class="form-label text-danger">
                                        @error('last_name')
                                            {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                <div>
                                    <label class="mb-1">Profile picture</label>
                                    <input type="file" class="form-control @error('profile_picture') is-invalid @enderror {{$errors->any('profile_picture')?'is-valid':''}} " id="floatingInput" name="profile_picture" placeholder="Profile Picture">
                                    </div>
                                    <p class="form-label text-danger">
                                        @error('profile_picture')
                                            {{$message}}
                                        @enderror
                                    </p>
                                <div class="float-end">
                                    <input type="submit"  name="submit" class="btn btn-primary btn-sm mt-2" value="Save Changes">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="card border-danger mb-3 shadow-sm">
                <div class="card-body text-danger">
                  <h5 class="card-title">Delete Profile</h5>
                  <p class="card-text">Your Account will be <strong>deleted permanently</strong></p>
                  <a href="{{route('delete.profile')}}" class="btn btn-danger btn-sm float-end px-4">Delete</a>
                </div>
              </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2"></div>
    </div>
    </div>
@endsection