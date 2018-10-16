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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 171.2px;"
                                >#
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 218.4px;">
                                    English Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 185.5px;">
                                    Arabic Name
                                </th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 146.9px;">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $cat)
                                <tr role="row" class="odd">
                                    <td class="">{{ $cat->id }}</td>
                                    <td>{{ $cat->name_en }}</td>
                                    <td>{{ $cat->name_ar }}</td>
                                    <td class="sorting_1">
                                        <a class="btn btn-primary"
                                           href="{{ route('categories.edit', $cat->id) }}">Edit</a>
                                        <a class="btn btn-danger"
                                           href="{{ route('categories.delete', $cat->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection