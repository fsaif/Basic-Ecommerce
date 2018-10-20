@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header text-white bg-primary">
                @lang('app.mform_t2')
            </div>
            <form role="form" method="POST" action="{{ route('editmyprofile.route') }}" class="needs-validation"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>@lang('app.e_profile_a')</label>
                                <input type="text"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username" value="{{ $user->username }}" required/>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('app.e_profile_b')</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ $user->email }}"
                                       required/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('app.e_profile_c')</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                       value="{{ $user->password }}" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('app.e_profile_d')</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       value="{{ $user->password }}" required/>
                            </div>
                            <div class="form-group">
                                <label>@lang('app.e_profile_e')</label>
                                <input type="file" class="form-control-file" id="img" name="img"
                                       onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid" src="{{ asset("storage/users/$user->img") }}" alt="Card image cap"
                                 id="output"/>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">@lang('app.e_profile_f')</button>
                </div>
            </form>
        </div>
    </div>

@endsection
