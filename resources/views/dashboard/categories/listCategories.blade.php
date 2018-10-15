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
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                                                                                                aria-controls="example1"
                                                                                                class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                    </div>
                    <div class="col-sm-6">
                        <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                        class="form-control input-sm" placeholder="" aria-controls="example1"
                                        type="search"></label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="DataTable" class="table table-bordered table-striped dataTable" role="grid"
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
                                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10
                            of 57 entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="example1_previous"><a href="#"
                                                                                                        aria-controls="example1"
                                                                                                        data-dt-idx="0"
                                                                                                        tabindex="0">Previous</a>
                                </li>
                                <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1"
                                                                      tabindex="0">1</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2"
                                                                tabindex="0">2</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                                tabindex="0">3</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                                tabindex="0">4</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                                tabindex="0">5</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                                tabindex="0">6</a></li>
                                <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1"
                                                                                       data-dt-idx="7"
                                                                                       tabindex="0">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection