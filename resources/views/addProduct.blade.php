@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Create New Item</h2>
        <div class="card">
            <div class="card-header text-white bg-primary">
                Create New Item
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <form method="POST" action="{{ route('additem.route') }}" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="InputUser" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="InputUser" name="name" onkeyup="liveName(event)" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="description" name="description" onkeyup="liveDescription(event)" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-2 col-form-label">Price</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" id="price" name="price" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-2 col-form-label">Country</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="country" name="country" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-2 col-form-label">Category</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="category" name="category" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" id="upload" name="upload" onchange="loadFile(event)">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add item</button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0">
                            <img class="card-img-top img-thumbnail img-fluid" src="{{ asset('storage/items/item.jpg') }}" alt="Card image cap" id="output" class="img-fluid img-thumbnail">
                            <div class="card-body">
                                <h4 class="card-title" id="OutputUser"></h4>
                                <p class="card-text" id="OutputDescripe"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
