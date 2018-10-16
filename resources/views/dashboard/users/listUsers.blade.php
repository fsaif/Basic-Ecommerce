@extends('dashboard.layouts.dashboard')

@section('content')

    @if(session('alert_sucesss'))
        <div class="alert alert-success">{{session('alert_sucesss')}}</div>
    @elseif(session('alert_danger'))
        <div class="alert alert-danger">{{session('alert_danger')}}</div>
    @endif

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Users Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-list" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 171.2px;"
                                    aria-label="Rendering engine: activate to sort column ascending">#
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 218.4px;" aria-label="Browser: activate to sort column ascending">
                                    username
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 185.5px;" aria-label="Platform(s): activate to sort column ascending">
                                    email
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 146.9px;"
                                    aria-label="Engine version: activate to sort column ascending"
                                    aria-sort="descending">actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr role="row">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        <a class="btn btn-danger"
                                           href="{{ route('users.delete', $user->id) }}">Delete</a>
                                        <a class="btn btn-success"
                                           href="{{ route('users.show', $user->id) }}">Details</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">username</th>
                                <th rowspan="1" colspan="1">email</th>
                                <th rowspan="1" colspan="1">actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection