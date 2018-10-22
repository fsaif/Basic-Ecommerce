@extends('dashboard.layouts.dashboard')

@section('content')

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- form start -->
                <form class="needs-validation" method="POST" action="{{ route('categories.update', $cat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label>English Name</label>
                            <input class="form-control" name="name_en" value="{{ $cat->name_en }}" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Arabic Name</label>
                            <input class="form-control" name="name_ar" value="{{ $cat->name_ar }}" type="text" required>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a class="btn btn-default" href="{{ route('categories.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Confirm</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>


@endsection