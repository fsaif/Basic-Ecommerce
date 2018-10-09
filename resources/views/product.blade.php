@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="text-center font-weight-bold"> {{ $item->name }} </h2>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/items/'.$item->img) }}" class="img-fluid img-thumbnail"/>
            </div>
            <div class="col-md-9">
                <h5>{{ $item->name }}</h5>
                <p>{{ $item->description }}</p>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <i class="far fa-calendar-alt"></i>
                                Added Date
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-money-bill-alt"></i>
                                price
                            </td>
                            <td>${{ $item->price }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-caret-square-right"></i>
                                Made in
                            </td>
                            <td>{{ $item->country }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fas fa-tags"></i>
                                Category
                            </td>
                            <td>{{ $item->category->name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="far fa-user"></i>
                                Added by
                            </td>
                            <td>{{ $item->user->username }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr/>

        @auth
        <div class="p-1 mb-5">
            <form class="needs-validation" method="post" action="{{ route('addcomment.route', $item->id) }}">
                @csrf
                <div class="form-group">
                    <label for="Textarea2">Add your comments</label>
                    <textarea class="form-control" name="comment" id="Textarea2" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add comment</button>
            </form>
        </div>
        @endauth

        <div class="row">
            @foreach($comments as $comment)
                <div class="col-12">
                    <article class="comment">
                        <a class="comment-img">
                            <img src="{{ asset('storage/users/'.$comment->user->img) }}" alt="" width="50" height="50">
                        </a>

                        <div class="comment-body">
                            <div class="text">
                                <p>{{ $comment->comment }}</p>
                            </div>
                            <p class="attribution">by {{ $comment->user->username }} at {{ $comment->created_at }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

    </div>
@endsection
