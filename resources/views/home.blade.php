@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fast Growing Blog</title>
    </head>
    <body>
        @section('content')
        @if(!empty($categories))
        <blog
            :categories='{{ $categories }}'
            :posts='{{ $posts }}'
            ></blog>
        @else
        <div class='d-flex flex-center flex-column'>
            <h4>Welcome to the Fast Growing Blog</h4>
            <div>
                The blog is ready to go, just <a href="/register">register</a>, sign in and goto the <a href="/editor">editor</a> to get started.
            </div>
        </div>
        @endif
        @endsection
    </body>
</html>
