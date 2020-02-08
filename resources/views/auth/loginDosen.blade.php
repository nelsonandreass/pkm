@extends('layouts.appDosen')

@section('content')
           
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Login Staff') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/loginprocess') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('email') is-invalid @enderror" name="emaildosen">
                             
                            </div>
                
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-4"></div>
                        <a href="{{url('/')}}" class="ml-3 mt-2">Login as Student</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
