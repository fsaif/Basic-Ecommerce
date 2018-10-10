@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-5">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-primary size-48" href="{{ route('signin') }}">@lang('app.link_a')</a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link text-muted px-0 size-48">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted size-48" href="{{ route('signup') }}">@lang('app.link_b')</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="@lang('app.form_a')" value="{{ old('username') }}" required autofocus>

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


                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary form-control">
                            @lang('app.link_a')
                        </button>


                    </div>
                </form>
            </div>
    </div>
</div>
@endsection


