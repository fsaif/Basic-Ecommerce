@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Product Details</h3>
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
                        <td>
                            <i class="fa fa-navicon"></i>
                            Item Name
                        </td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-dashcube"></i>
                            description
                        </td>
                        <td>{{ $item->description }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i>
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
                            <i class="fa fa-money"></i>
                            Price
                        </td>
                        <td>${{ $item->price }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-caret-right"></i>
                            Country
                        </td>
                        <td>{{ $item->country }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-tags"></i>
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
        </div>

@endsection