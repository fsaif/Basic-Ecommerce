@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-danger">
        <div class="box-header with-border">
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
                            <i class="fa fa-calendar"></i>
                            created by:
                        </td>
                        <td>
                            @if($item->creater != null)
                                {{ $item->creater->username }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i>
                            product owned by:
                        </td>
                        <td>
                            @if($item->owner != null)
                                {{ $item->owner->username }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i>
                            last update date:
                        </td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i>
                            updated by:
                        </td>
                        <td>
                            @if($item->updater != null)
                                {{ $item->updater->username }}
                            @endif
                        </td>
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
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('products.index') }}">Cancel</a>
            <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                  style="display: inline-block" class="pull-right">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Confirm"/>
            </form>
        </div>

@endsection