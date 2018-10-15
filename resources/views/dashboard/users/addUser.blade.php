@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Add User</h3>
        </div>
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ route('users.store') }}"
        "
        enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="InputUsername" class="col-sm-2 control-label">Username:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="InputUsername" name="username" placeholder="text here"
                           value="{{ old('username') }}" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="text here"
                           required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password:</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                           placeholder="text here" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email here"
                           value="{{ old('email') }}" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="upload" class="col-sm-2 control-label">Image</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <input id="img" type="file" class="form-control-file" name="img" onchange="loadFile(event)">
                        </div>
                        <div class="col-md-4">
                            <img id="output" src="{{ asset("storage/users/icon.jpg") }}" alt="not found"
                                 class="img-fluid img-thumbnail"
                                 style="max-width: 250px; max-height: 250px; min-height: 250px; min-width: 250px;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('dashboard') }}">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Confirm</button>
        </div>
        <!-- /.box-footer -->
        </form>
    </div>

@endsection