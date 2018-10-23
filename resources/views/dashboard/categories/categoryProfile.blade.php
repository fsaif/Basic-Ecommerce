@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Category Profile</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>English Name</td>
                    <td>{{ $cat->name_en }}</td>
                </tr>
                <tr>
                    <td>Arabic Name</td>
                    <td>{{ $cat->name_ar }}</td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-calendar"></i>
                        registry date:
                    </td>
                    <td>{{ $cat->created_at }}</td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-calendar"></i>
                        created by:
                    </td>
                    <td>
                        @if($cat->creater != null)
                            {{ $cat->creater->username }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-calendar"></i>
                        last update date:
                    </td>
                    <td>{{ $cat->updated_at }}</td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-calendar"></i>
                        updated by:
                    </td>
                    <td>
                        @if($cat->updater != null)
                            {{ $cat->updater->username }}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('categories.index') }}">Cancel</a>
        </div>
    </div>

@endsection