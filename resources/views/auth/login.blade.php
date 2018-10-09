@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-5">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-primary size-48" href="{{ route('signin') }}">Login</a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link text-muted px-0 size-48">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted size-48" href="{{ route('signup') }}">Signup</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Type your username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Type your password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary form-control">
                            {{ __('Login') }}
                        </button>


                    </div>
                </form>
            </div>
    </div>
</div>
@endsection


