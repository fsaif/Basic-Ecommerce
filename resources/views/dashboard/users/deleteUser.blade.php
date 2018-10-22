@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Delete User Confirmation</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-3">
                <img src="{{ asset('storage/users/'.$user->img) }}" class="img-fluid img-thumbnail"/>
            </div>
            <div class="col-md-9">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>
                            <i class="fa fa-user-circle"></i>
                            username:
                        </td>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-envelope-o"></i>
                            email:
                        </td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i>
                            registry date:
                        </td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('users.index') }}">Cancel</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                  style="display: inline-block" class="pull-right">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Confirm"/>
            </form>
        </div>

@endsection