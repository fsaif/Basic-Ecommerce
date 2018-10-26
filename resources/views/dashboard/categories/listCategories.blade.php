@extends('dashboard.layouts.dashboard')

@section('content')

    @if(session('alert_sucesss'))
        <div class="alert alert-success">{{session('alert_sucesss')}}</div>
    @elseif(session('alert_danger'))
        <div class="alert alert-danger">{{session('alert_danger')}}</div>
    @endif

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Categories Table</h3>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                    #priority
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                    English Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                    Arabic Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                    created by
                                </th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $cat)
                                <tr role="row" class="odd">
                                    <td>{{ $cat->priority }}</td>
                                    <td>{{ $cat->name_en }}</td>
                                    <td>{{ $cat->name_ar }}</td>
                                    <td>
                                        @if($cat->creater != null)
                                            {{ $cat->creater->username }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('categories.up', $cat->id ) }}"><i
                                                    class="fa fa-arrow-up"></i></a>
                                        <a href="{{ route('categories.down', $cat->id) }}"><i
                                                    class="fa fa-arrow-down"></i></a>
                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('categories.edit', $cat->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm"
                                           href="{{ route('categories.delete', $cat->id) }}">Delete</a>
                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('categories.show', $cat->id) }}">Details</a>
                                        <a class="btn btn-default btn-sm"
                                           href="{{ route('categories.activation', $cat->id ) }}">
                                            @if($cat->status == 0)
                                                Deactivate
                                            @elseif($cat->status == 1)
                                                Activate
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#priority</th>
                                <th rowspan="1" colspan="1">English Name</th>
                                <th rowspan="1" colspan="1">Arabic Name</th>
                                <th rowspan="1" colspan="1">created by</th>
                                <th rowspan="1" colspan="1">Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection