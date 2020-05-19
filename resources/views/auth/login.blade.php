@extends('layouts.app')
 @section('content')
 <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-header bg-transparent pb-5">
            <div class="text-muted text-center mt-2 mb-3">   
               <img src="img/brand/blue.png" width="189px">
            </div>
          </div>
          <div class="card-body px-lg-5 py-lg-5">
            @error('email')
               <div class="alert alert-warning text-center" role="alert">verifier email ou le mots de passe</div>
            @enderror
          <form role="form" method="POST" action="{{route('login')}}">
            @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" name="email" value=" {{old("email")}} ">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Password" type="password" name="password" value="{{old("password")}}">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                <label class="custom-control-label" for=" customCheckLogin">
                  <span class="text-muted">Remember me</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">log in</button>
              </div>

            </form>

          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            @if (Route::has('password.request'))
                 <a href="{{ route('password.request') }}" class="text-light text-center"><small>Forgot password?</small></a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection
       
