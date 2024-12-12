@extends('auth.layouts')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h4>Register</h4></div>

    <div class="card-body">
      <form method="POST" action="{{ route('register.process') }}">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control" name="email" tabindex="1" autofocus>
          @error('email')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>

        <div class="form-group">
          <div class="d-block">
              <label class="control-label">Name</label>            
          </div>
          <input type="text" class="form-control" name="name" tabindex="2">
          @error('name')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>
        
        <div class="form-group">
          <div class="d-block">
              <label class="control-label">Phone</label>            
          </div>
          <input type="text" class="form-control" name="phone" tabindex="2">
          @error('phone')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>
        
        <div class="form-group">
          <div class="d-block">
              <label class="control-label">Address</label>            
          </div>
          <input type="text" class="form-control" name="address" tabindex="2">
          @error('address')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>
        
        <div class="form-group">
          <div class="d-block">
              <label class="control-label">No SIM</label>            
          </div>
          <input type="text" class="form-control" name="sim" tabindex="2">
          @error('sim')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>
        
        <div class="form-group">
          <div class="d-block">
              <label for="password" class="control-label">Password</label>            
          </div>
          <input id="password" type="password" class="form-control" name="password" tabindex="2">
          @error('password')
              <span class="text-danger"><small>{{ $message }}</small></span>
          @enderror
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
          </button>
        </div>
      </form>      
    </div>
  </div>
  <div class="mt-5 text-muted text-center">
    Have an account? <a href="{{ route('login') }}">Sign In</a>
  </div>
@endsection