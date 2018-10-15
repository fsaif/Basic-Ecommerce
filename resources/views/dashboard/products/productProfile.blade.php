@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $item->name }}</h3>
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
                        <td>description</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-calendar-alt"></i>
                            Create Date
                        </td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="far fa-money-bill-alt"></i>
                            Price
                        </td>
                        <td>${{ $item->price }}</td>
                    </tr>
                    <tr>
                        <td><i class="far fa-caret-square-right"></i>
                            Country
                        </td>
                        <td>{{ $item->country }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-tags"></i>
                            Category
                        </td>
                        <td>{{ $item->category->name_en }}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="far fa-user"></i>
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
        </div>

@endsection