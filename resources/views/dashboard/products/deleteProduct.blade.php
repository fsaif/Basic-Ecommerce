@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Delete Product Confirmation</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-3">
                <img src="{{ asset('storage/items/'.$item->img) }}" class="img-fluid img-thumbnail"/>
            </div>
            <div class="col-md-9">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Item Name</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                    <tr>
                        <td>
                            Create Date
                        </td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <td>
                            Price
                        </td>
                        <td>${{ $item->price }}</td>
                    </tr>
                    <tr>
                        <td>
                            Country
                        </td>
                        <td>{{ $item->country }}</td>
                    </tr>
                    <tr>
                        <td>
                            Category
                        </td>
                        <td>{{ $item->category->name_en }}</td>
                    </tr>
                    <tr>
                        <td>
                            Belongs to
                        </td>
                        <td>{{ $item->user->username }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('dashboard') }}">Cancel</a>
            <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                  style="display: inline-block" class="pull-right">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Confirm"/>
            </form>
        </div>

@endsection