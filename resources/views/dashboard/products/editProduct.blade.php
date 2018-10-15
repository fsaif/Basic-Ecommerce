@extends('dashboard.layouts.dashboard')

@section('content')

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add User</h3>
            </div>
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('products.update', $item->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="InputUser" class="col-sm-2 control-label">Item name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="InputUser" name="name" placeholder="{{ $item->name }}"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="{{ $item->description }}" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="{{ $item->price }}"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">Country</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="country" name="country" placeholder="{{ $item->country }}"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-md-10">
                            <select class="form-control" id="category" name="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="upload" class="col-sm-2 control-label">Image</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" id="upload" name="upload"">
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