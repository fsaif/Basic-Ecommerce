@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col" width="120">Quantity</th>
                    <th scope="col" width="120">Price</th>
                    <th scope="col" width="200" class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($items  != null)
                @foreach($items as $item)
                    <tr>
                        <td>
                            <figure class="media">
                                <div class="img-wrap"><img src="{{ asset('storage/items/'.$item->img) }}" class="img-thumbnail img-sm" style="max-width: 180px;"></div>
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">{{ $item->name }}</h6>
                                    <dl class="dlist-inline small">
                                        <dt>Size:</dt>
                                        <dd>XXL</dd>
                                    </dl>
                                    <dl class="dlist-inline small">
                                        <dt>Color:</dt>
                                        <dd>Orange color</dd>
                                    </dl>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">{{ $item->price }}</var>
                                <small class="text-muted">{{ $total }}</small>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td class="text-right">
                            <a href="{{ route('removeFromCart.route', $item->id . ":" . $item->quantity) }}" class="btn btn-outline-danger"> × Remove</a>
                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div> <!-- card.// -->
    </div>
@endsection