@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card show-post">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <h3 class="text-center text-success mb-0" style="font-size: 22px; flex-grow: 1;">Ask Jeeves</h3>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary" style="font-size: 22px;">Back</a>
                        </div>

                        <br/>
                        <h4 class="text-center">{{ $post->title }}</h4>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h5 class="text-center">Comments</h5>
                        @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        <hr />
                        <h4 class="text-center">Add comment</h4>
                        <form method="post" action="{{ route('comments.store'   ) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body" placeholder="Your comment here..."></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info w-100" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
