@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="code_cart">
            <div class="card">
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col" width="120">Price</th>
                        <th scope="col" width="120">Quantity</th>
                        <th scope="col" width="200" class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($items  != null)
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <figure class="media">
                                        <div class="img-wrap"><img src="{{ asset('storage/items/'.$item->img) }}"
                                                                   class="img-thumbnail img-sm"
                                                                   style="max-width: 180px;"></div>
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
                                    <div class="price-wrap">
                                        <var class="price">
                                            @if(\Illuminate\Support\Facades\Session::get('currency') == 1)
                                                ${{ $item->price }}
                                            @else
                                                jd{{ \App\Currency::convert($item->price) }}
                                            @endif
                                        </var>
                                        <small class="text-muted">
                                            {{--@if(\Illuminate\Support\Facades\Session::get('currency') == 1)--}}
                                            {{--${{ $total }}--}}
                                            {{--@else--}}
                                            {{--jd{{ \App\Currency::convert($total) }}--}}
                                            {{--@endif--}}
                                            per item
                                        </small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td>
                                    <form class="form-inline row" action="{{ route('addToCart.route', $item->id) }}"
                                          method="post">
                                        @csrf
                                        <div class="form-group">
                                            <span class="btn btn-sm btn-outline-danger mr-1" onclick="{increasePrice()}"><i class="fa fa-plus fa-fw"></i></span>
                                            <input type="text"  class="form-control-sm" id="quantity" value="{{ $item->quantity }}" disabled />
                                            <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
                                            <span class="btn btn-sm btn-outline-danger ml-1" onclick="{decreasePrice()}"><i class="fa fa-minus fa-fw"></i></span>
                                        </div>
                                    </form>

                                </td>
                                <td class="text-right">
                                    <a href="{{ route('removeFromCart.route', $item->id . ":" . $item->quantity) }}"
                                       class="btn btn-outline-danger"> × </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div> <!-- card.// -->
        </div>
    </div>
@endsection