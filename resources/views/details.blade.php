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
        <post-details :post='{{ $post }}'></post-details>
        @endsection
    </body>
</html>
