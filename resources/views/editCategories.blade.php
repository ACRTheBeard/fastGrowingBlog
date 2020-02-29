@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- list out the categories and allow a new category to be made-->
                    <a href="{{ url('/editor/categories/new') }}">
                        Add Category
                    </a><br />

                    @foreach($categories as $category)
                    <a href="{{ url('/editor/categories/' . $category->id) }}">
                        {{$category->name}}
                    </a><br />
                    @endforeach
                </div>
            </div>
            <a href="/editor">Back to editor</a>
        </div>
    </div>
</div>
@endsection
