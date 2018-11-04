@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/items/'.$item->img) }}" class="img-fluid img-thumbnail"/>
            </div>
            <div class="col-md-8">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td colspan="2"><b>{{ $item->name }}</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>{{ $item->description }}</b></td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-calendar-alt"></i>
                                @lang('app.item_a')
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-money-bill-alt"></i>
                                @lang('app.item_b')
                            </td>
                            <td>${{ $item->price }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-caret-square-right"></i>
                                @lang('app.item_c')
                            </td>
                            <td>{{ $item->country }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fas fa-tags"></i>
                                @lang('app.item_d')
                            </td>
                            <td>{{ $category }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-user"></i>
                                @lang('app.item_e')
                            </td>
                            <td>
                                @if($item->creater != null)
                                    {{ $item->creater->username }}
                                @endif
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <form method="post" action="{{ route('addToCart.route', $item->id) }}">
                        @csrf
                        <input type="number" name="quantity" min="1" value="1"/>

                        <input type="submit" value="add to cart" class="btn btn-sm btn-secondary"/>

                    </form>
                </div>
            </div>
        </div>

        <hr/>

        @auth
            <div class="p-1 mb-5">
                <form class="needs-validation" method="post" action="{{ route('addcomment.route', $item->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>@lang('app.item_f')</label>
                        <textarea class="form-control" name="comment" rows="2" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">@lang('app.item_g')</button>
                </form>
            </div>
        @endauth


        <div class="row">
            @foreach($comments as $comment)
                <div class="col-12">
                    <div class="row comment">
                        <div class="col-1 comment-img">
                            <img src="{{ asset('storage/users/'.$comment->user->img) }}" alt="" width="50" height="50">
                        </div>

                        <div class="col-11 comment-body">
                            <div class="text">
                                <p>{{ $comment->comment }}</p>
                            </div>
                            <p class="attribution">@lang('app.comment_by') {{ $comment->user->username }} @lang('app.comment_at') {{ $comment->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
