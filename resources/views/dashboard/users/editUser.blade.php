@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
        </div>
        <!-- form start -->
        <form class="needs-validation" method="POST" action="{{ route('users.update', $user->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username"
                                   value="{{ $user->username }}"
                                   required/>
                            @if($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password"
                                   value="{{ $user->password }}"
                                   required/>
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control"
                                   name="password_confirmation"
                                   value="{{ $user->password }}" required/>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{ $user->email }}"
                                   required/>
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input id="img" type="file" class="form-control-file" name="img"
                                   onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img id="output" src="{{ asset("storage/users/$user->img") }}" alt="not found"
                             class="img-fluid img-thumbnail"
                             style="max-width: 250px; max-height: 250px; min-height: 250px; min-width: 250px;"/>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-default" href="{{ route('users.index') }}">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Confirm</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>


@endsection