@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- list out the posts and allow a new post to be made-->
                    <a href="{{ url('/editor/posts/new') }}">
                        Add Post
                    </a><br />

                    @foreach($posts as $post)
                    <a href="{{ url('/editor/posts/' . $post->id) }}">
                        {{$post->name}}
                    </a><br />
                    @endforeach
                </div>
            </div>
            <a href="/editor">Back to editor</a>
        </div>
    </div>
</div>
@endsection
