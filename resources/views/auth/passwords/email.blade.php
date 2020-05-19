@extends('layouts.app')

@section('content')


<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-header bg-transparent pb-5">
            <div class="text-muted text-center mt-2 mb-3">   
               <img src="{{ asset("img/brand/blue.png")}}" width="189px">
            </div>
          </div>
          
          <div class="card-body px-lg-5 py-lg-5">
            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    <strong>Success!</strong> check your email 
                </div>
            @endif

            @error('email')
            <div class="alert alert-warning text-center" role="alert">
                <strong> {{ $message }}</strong>
            </div>
             @enderror
            
          <form role="form" method="POST" action="{{ route('password.email') }}">
            @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" name="email">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Reset password</button>
              </div>

            </form>

          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
             <a href="{{ route('login') }}" class="text-light text-center"><small>log in</small></a>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection