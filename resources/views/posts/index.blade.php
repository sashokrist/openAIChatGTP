@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center">All about AI</h3>
                <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Post</a>
                <table class="table table-dark table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
