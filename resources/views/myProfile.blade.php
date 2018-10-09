@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center font-weight-bold">My Profile</h2>
        <div class="card">
            <div class="card-header text-white bg-primary">
                My Information
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <i class="far fa-user"></i>
                                Login Name
                            </td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-envelope"></i>
                                Email
                            </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-calendar-alt"></i>
                                Registered Date
                            </td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{ route('myprofileform.route') }}" class="btn btn-light border-secondary">Edit Information</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
