@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <input type="email" value="{{ old('email') }}" name="email" placeholder="Email Address"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="password" type="password" name="password" placeholder="Enter your password"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <span>
								<input type="checkbox" class="checkbox" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                                        {{ __('Keep me signed in') }}
							</span>
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-1">
            <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <input class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" id="name" type="text" placeholder="Name" required autocomplete="name" autofocus/>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                           name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email"/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password"
                           name="password" type="password" placeholder="Password"/>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password" placeholder="Confirm password">

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" style="width: 100%;" name="role">
                            <option value="0" selected="selected">Customer</option>
                            <option value="1">Admin</option>
                            <option value="2">Pharmacist</option>
                            <option value="3">Courier</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-default">Signup</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div><!--/sign up form-->
        </div>
    </div>

@endsection
