@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            @if (count($post ->tags))
                <ul>
                    @foreach($post->tags as $tag)

                        <li>{{$tag->name}}</li>

                    @endforeach
                </ul>
            @endif
            <p>{{$post->body}}</p>
            <hr>
            <div class="comments">
                @foreach($post -> comments as $comment)

                    <ul class="list-group-item">
                        {{$comment->body}} &nbsp;,
                        {{$comment-> created_at->diffForHumans()}}
                        <div class="ml-auto p-2">Posted by {{ $comment -> user ->name}}</div>
                    </ul>

                @endforeach
            </div>
        </div>
        {{--- Add a comment ---}}
        <div class="card">
            <div class="card-block">
                <form method="post" action="/posts/{{$post -> id}}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" placeholder="Enter comment" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
                @include('layouts.errors')
            </div>
        </div>
    </div>
@endsection
