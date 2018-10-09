@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-muted size-48" href="{{ route('signin') }}">Login</a>
                </li>
                <li class="nav-item disabled">
                    <a class="nav-link text-muted px-0 size-48">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success size-48" href="{{ route('signup') }}">Signup</a>
                </li>
            </ul>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Type a complex password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Type a password again" required>
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Type a valid email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input id="img" type="file" class="form-control-file" name="img" onchange="loadFile(event)">
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img id="output" src="{{ asset("storage/users/icon.jpg") }}" alt="not found" class="img-fluid img-thumbnail"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success form-control">
                        Signup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



