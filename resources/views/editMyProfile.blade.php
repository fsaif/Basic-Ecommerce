@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Edit Profile</h2>
        <div class="card">
            <div class="card-header text-white bg-primary">
                My Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <form method="POST" action="{{ route('editmyprofile.route') }}" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-md-2 col-form-label">Username</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="{{ $user->username }}" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="{{ $user->email }}" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" id="password" name="password" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="repass" class="col-md-2 col-form-label">Confirm Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" id="repass" name="repass" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" id="upload" name="img" onchange="loadFile(event)">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">send</button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0">
                            <img class="card-img-top img-thumbnail img-fluid" src="{{ asset("storage/users/$user->img") }}" alt="Card image cap" id="output" class="img-fluid img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
