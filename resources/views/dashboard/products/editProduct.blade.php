@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Product</h3>
        </div>
        <!-- form start -->
        <form class="needs-validation" method="POST" action="{{ route('products.update', $item->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Item name:</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ $item->name }}"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description"
                                   value="{{ $item->description }}" required/>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price"
                                   value="{{ $item->price }}"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country"
                                   value="{{ $item->country }}"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" id="upload" name="upload"
                                   onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img id="output" src="{{ asset('storage/items/'.$item->img) }}"
                             class="img-fluid img-thumbnail"
                             style="max-width: 250px; max-height: 250px; min-height: 250px; min-width: 250px;"/>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-default" href="{{ route('products.index') }}">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Confirm</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection