@extends('layouts.layout')
@section('page_title')
    Register
@endsection

@section('content')
<div class="container mt-5">
	<div class="row">
        @if (isset($_GET['msg']))
            <p class="text-center {{$_GET['color']}}">{{$_GET['msg']}}</p>
        @endif
        <h1 class="h3 mb-3 fw-bold fs-1 text-primary">Sign Up</h1>
				<div class="col-sm col-md col-lg col-xl">
			<form action="{{route('register_process')}}" method="POST" enctype="multipart/form-data">
                @csrf
				<div class="row">
					  <div class="col-sm-6 col-md-6 col-lg-6">
						  <div class="form-floating">
                <input type="text" class="form-control @error('first_name') is-invalid @enderror {{$errors->any('first_name')?'is-valid':''}} " id="floatingInput" name="first_name" value="{{old('first_name')}}" placeholder="First Name">
                <label for="floatingInput">First Name</label>
              </div>
              <p class="form-label text-danger">
                  @error('first_name')
                      {{$message}}
                  @enderror
              </p>
					  </div>
					  <div class="col-sm-6 col-md-6 col-lg-6">
						<div class="form-floating">
              <input type="text" class="form-control @error('last_name') is-invalid @enderror {{$errors->any('last_name')?'is-valid':''}} " id="floatingInput" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
              <label for="floatingInput">Last Name</label>
            </div>
            <p class="form-label text-danger">
                @error('last_name')
                    {{$message}}
                @enderror
            </p>
					  </div>
				</div>
				<div class="row mt-2">
          <div class="col-sm-6 col-md-6 col-lg-6">
            {{-- <label class="form-label">Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror {{$errors->any('email')?'is-valid':''}}" name="email" value="{{old('email')}}" placeholder="example@gmail.com">--}}
            <div class="form-floating">
              <input type="email" class="form-control @error('email') is-invalid @enderror {{$errors->any('email')?'is-valid':''}} " id="floatingInput" name="email" value="{{old('email')}}" placeholder="example@.com">
              <label for="floatingInput">Email</label>
            </div>
            <p class="form-label text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </p>
          </div>
					  <div class="col-sm-6 col-md-6 col-lg-6">
              {{-- <label class="form-label">Password</label>
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror {{$errors->any('password')?'is-valid':''}}" value="{{old('password')}}" name="password" placeholder="Password"> --}}
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror {{$errors->any('password')?'is-valid':''}} " id="floatingInput" name="password" value="{{old('password')}}" placeholder="Password">
                <label for="floatingInput">Password</label>
              </div>
              <p class="form-label text-danger">
                  @error('password')
                      {{$message}}
                  @enderror
              </p>
					  </div>
				</div>
				<div class="row mt-2">
					  <div class="col-sm-6 col-md-6 col-lg-6">
              <label class="form-label">Gender</label><br>
              <input type="radio" id="gender_male" name="gender" value="Male" {{old('gender') == 'Male'?'checked':''}}> Male
              <input type="radio" id="gender_female" name="gender" value="Female" {{old('gender') == 'Female'?'checked':''}}> Female
              <p class="form-label text-danger">
                  @error('gender')
                      {{$message}}
                  @enderror
              </p>
					  </div>
					  <div class="col-sm-6 col-md-6 col-lg-6">
              {{-- <label class="form-label">Date of Birth</label>
              <input type="date" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror {{$errors->any('date_of_birth')?'is-valid':''}}" value="{{old('date_of_birth')}}" name="date_of_birth" placeholder="DD-MM-YYYY"> --}}
              <div class="form-floating">
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror {{$errors->any('date_of_birth')?'is-valid':''}} " id="floatingInput" name="date_of_birth" value="{{old('date_of_birth')}}" placeholder="Date of Birth">
                <label for="floatingInput">Date of Birth</label>
              </div>
              <p class="form-label text-danger">
                  @error('date_of_birth')
                      {{$message}}
                  @enderror
              </p>
					  </div>
				</div>	  			
				  <div class="row mt-2">
					  <div class="col-sm-6 col-md-6 col-lg-6">
						  <div>
              <input type="file" class="form-control @error('profile_picture') is-invalid @enderror {{$errors->any('profile_picture')?'is-valid':''}} " id="floatingInput" name="profile_picture" placeholder="Profile Picture">
              </div>
              <p class="form-label text-danger">
                  @error('profile_picture')
                      {{$message}}
                  @enderror
              </p>
					  </div>	
					  <div class="col-sm-6 col-md-6 col-lg-6">
              {{-- <label class="form-label">Address</label>
              <input type="text" id="address" class="form-control @error('address') is-invalid @enderror  {{$errors->any('address')?'is-valid':''}}" value="{{old('address')}}" name="address" placeholder="eg. Jamshoro Pakistan"> --}}
              <div class="form-floating">
                <input type="text" class="form-control @error('address') is-invalid @enderror {{$errors->any('address')?'is-valid':''}} " id="floatingInput" name="address" value="{{old('address')}}" placeholder="First Name">
                <label for="floatingInput">Address</label>
              </div>
              <p class="form-label text-danger">
                  @error('address')
                      {{$message}}
                  @enderror
              </p>
					  </div>	
				  </div>
				  <div class="row mt-5">
					  <input type="submit" id="register_btn" class="btn btn-primary" name="register" value="Sign Up">
				  </div>
			</form>
		</div>
			</div>
</div>
@endsection