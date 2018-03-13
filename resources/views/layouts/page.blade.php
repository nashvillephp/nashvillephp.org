@extends('layouts.app')

@section('content')
<div class="bg-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1>@yield('title')</h1>
                <hr class="white-bar">
                <p class="pb-2">@yield('subtitle')</p>
            </div>
        </div>
    </div>
</div>

<div class="page-content-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-1"></div>
            <div class="col-md-12 offset-md-0 col-lg-10">
                <div class="page-content">
                    <div class="page-text">

                        @yield('page-content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
