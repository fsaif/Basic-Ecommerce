@extends('dashboard.layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{ $stats['user_count'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Categories</span>
                    <span class="info-box-number">{{ $stats['category_count'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">{{ $stats['product_count'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

@endsection