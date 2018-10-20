@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('alert_success'))
            <div class="alert alert-success">{{session('alert_success')}}</div>
        @elseif(session('alert_danger'))
            <div class="alert alert-danger">{{session('alert_danger')}}</div>
        @endif

        <h2 class="text-center font-weight-bold">@lang('app.dropdown_c')</h2>
        <div class="row">
            @foreach($items as $item)
            <div class="col-md-3 p-3">
                <div class="card">
                    <img class="card-img-top img-thumbnail border-light bg-white" src="{{ asset('storage/items/'.$item->img) }}" alt="Card image cap">
                    <span class="price-label">${{ $item->price }}</span>
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('product.route', $item->id) }}">{{ $item->name }}</a></h4>
                        <div>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('edititemform.route', $item->id) }}">@lang('app.e_item_a')</a>
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('deleteitem.route', $item->id) }}">@lang('app.e_item_b')</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <small class="text-muted">{{ $item->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $items->render() }}
    </div>
@endsection
