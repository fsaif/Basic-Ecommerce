@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center font-weight-bold">@lang('app.dropdown_a')</h2>
        <div class="card">
            <div class="card-header text-white bg-primary">
                @lang('app.dropdown_a')
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <i class="far fa-user"></i>
                                @lang('app.profile_a')
                            </td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-envelope"></i>
                                @lang('app.profile_b')
                            </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-calendar-alt"></i>
                                @lang('app.profile_c')
                            </td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{ route('myprofileform.route') }}" class="btn btn-light border-secondary">@lang('app.e_item_a')</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
