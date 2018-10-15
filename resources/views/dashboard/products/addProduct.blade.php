@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Add User</h3>
        </div>
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ route('products.store') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="InputUser" class="col-sm-2 control-label">Item name:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="InputUser" name="name" placeholder="text here" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="text here" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="price" name="price" placeholder="text here" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-2 control-label">Country</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="country" name="country" placeholder="text here" required/>
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
                        <div class="row">
                            <div class="col-md-8">
                                <input id="upload" type="file" class="form-control-file" name="upload" onchange="loadFile(event)">
                            </div>
                            <div class="col-md-4">
                                <img id="output" src="{{ asset("storage/items/item.jpg") }}" alt="not found"
                                     class="img-fluid img-thumbnail"
                                     style="max-width: 250px; max-height: 250px; min-height: 250px; min-width: 250px;"/>
                            </div>
                        </div>
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