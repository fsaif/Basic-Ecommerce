@extends('dashboard.layouts.dashboard')

@section('content')

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category Form</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('categories.update', $cat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputCategory1" class="col-sm-2 control-label">English Name</label>

                            <div class="col-sm-10">
                                <input class="form-control" name="name_en" id="inputCategory1" placeholder="{{ $cat->name_en }}" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory2" class="col-sm-2 control-label">Arabic Name</label>

                            <div class="col-sm-10">
                                <input class="form-control" name="name_ar" id="inputCategory2" placeholder="{{ $cat->name_ar }}" type="text" required>
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