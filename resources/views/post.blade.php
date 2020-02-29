@extends('layouts.app')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '#content',
        menubar: ''
    });

    tinymce.init({
        selector: '#short_content',
        menubar: '',
        toolbar: 'bold, italic'
    });
</script>

@if ($id ?? $id='new') @endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if($id == 'new')Add a new Blog Post @else Edit Category @endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model('Post') }}

                    @if ($id != 'new')
                    {{ Form::label('id', 'ID') }}:
                    {{ $id }}
                    <br /><br />
                    @endif

                    {{ Form::label('name', 'Name') }}:
                    {{ Form::text('name', $name ?? '') }}
                    <br /><br />

                    {{ Form::label('category', 'Choose a category') }}
                    {{ Form::select('category_id', $categories, $category_id ?? 0) }}
                    <br /><br />

                    {{ Form::label('short_content', 'Short Content') }}<br />
                    <textarea id="short_content" name="short_content">{{ old('short_content', $short_content ?? '') }}</textarea>
                    <br /><br /><br />

                    {{ Form::label('content', 'Content') }}<br />
                    <textarea id="content" name="content">{{ old('content', $content ?? '') }}</textarea>
                    <br /><br />

                    {{ Form::submit()}}
                </div>
            </div>
            <br />
            <a href="/editor/posts">Back to post editor</a>&nbsp&nbsp&nbsp&nbsp<a href="/editor/">Back to editor</a>
        </div>
    </div>
</div>
@endsection
