@extends('layouts.page')

@section('title', 'Page Not Found')
@section('subtitle', 'Womp. Womp. Where’d that page go?')

@section('page-content')
    <p>The page requested does not exist.</p>
    <hr>
    <a class="nash-btn mt-5" href="{{ route('home') }}">Go home</a>
@endsection
