@extends('layouts.app')
@if ($id ?? $id='new') @endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if($id == 'new')Add a new Category @else Edit Category @endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model('Category') }}

                    @if ($id != 'new')
                    {{ Form::label('id', 'ID') }}:
                    {{ $id }}
                    <br />
                    @endif

                    @if ($parent_category_id != 'root')
                    <a href="{{ url('/editor/categories/' . $parent_category_id) }}">
                        Parent Category
                    </a><br />
                    <br />
                    @endif

                    {{ Form::label('name', 'Name') }}:
                    {{ Form::text('name', $name ?? '') }}
                    <br />
                    {{ Form::label('description', 'Description') }}:
                    {{ Form::text('description', $description ?? '') }}
                    <br />

                    @if ($id != 'new')
                    <a href="{{ url('/editor/categories/new/' . $id) }}">
                        Add a child category
                    </a><br />
                    <br />

                    <br />
                    @endif

                    {{ Form::submit()}}
                </div>
            </div>
            <br />
            @if($children->count() != 0)
                <div class="card">
                    <div class="card-header">Children</div>
                    <div class="card-body">
                        @foreach($children as $child)
                        <a href="/editor/categories/{{$child->id}}" >{{$child->name}}</a><br>
                        @endforeach
                    </div>
                </div>
            @endif
            <a href="/editor/categories">Back to category editor</a>&nbsp&nbsp&nbsp&nbsp<a href="/editor/">Back to editor</a>
        </div>
    </div>
</div>
@endsection
