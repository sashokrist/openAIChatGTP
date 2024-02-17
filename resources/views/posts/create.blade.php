@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card show-post">
                    <div class="card-header">
                        <h4 class="text-center text-white">Create Post</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('posts.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label text-white">Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label text-white">Post Body: </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info w-100" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
