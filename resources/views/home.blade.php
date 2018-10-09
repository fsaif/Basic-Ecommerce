@extends('layouts.app')

@section('content')
    <div class="container">

            <h1 class="text-center font-weight-bold">{{ $name }}</h1>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-3 p-3" >
                        <div class="card">
                            <img class="card-img-top img-thumbnail border-light bg-white" style="max-height: 250px;" src="{{ asset('storage/items/'.$item->img) }}" alt="Card image cap">
                            <span class="price-label">${{ $item->price }}</span>
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{ route('product.route', $item->id) }}">{{ $item->name }}</a></h4>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text text-right"><small class="text-muted">{{ $item->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        {{ $items->render() }}
    </div>
@endsection
