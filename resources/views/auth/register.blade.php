@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-muted size-48" href="{{ route('signin') }}">@lang('app.link_a')</a>
                </li>
                <li class="nav-item disabled">
                    <a class="nav-link text-muted px-0 size-48">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success size-48" href="{{ route('signup') }}">@lang('app.link_b')</a>
                </li>
            </ul>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    @if(!empty($name))
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$name}}" placeholder="@lang('app.form_a')" required autofocus>
                    @else
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="@lang('app.form_a')" required autofocus>
                    @endif    
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="@lang('app.form_b')" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="@lang('app.form_c')" required>
                </div>

                <div class="form-group">
                    @if(!empty($email))
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$email}}" placeholder="@lang('app.form_d')" required>
                        @else
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('app.form_d')" required>
                        @endif
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

                <div class="form-group row">
                    <label for="name" class="col-md-6 control-label">@lang('app.register_with')</label>
                    <div class="col-md-6">
                            <a href="{{ route('socialLogin','facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook fa-2x"></i></a>

                            <a href="{{ route('socialLogin','twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter fa-2x"></i></a>

                            <a href="{{ route('socialLogin','google') }}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus fa-2x"></i></a>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success form-control">
                        @lang('app.link_b')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



