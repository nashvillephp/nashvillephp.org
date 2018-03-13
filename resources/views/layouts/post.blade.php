@extends('layouts.app')

@section('content')

    @component('components.post-image')
        @slot('url')
            @yield('image-url')
        @endslot

        @slot('source')
            @yield('image-source')
        @endslot
    @endcomponent

    <div class="art-content-cont">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-0 col-lg-1">
                    @component('components.post-social', ['class' => 'art-social-left'])
                        @slot('title')
                            @yield('title')
                        @endslot

                        @slot('authorTwitter')
                            @yield('author-twitter')
                        @endslot
                    @endcomponent
                </div>
                <div class="col-md-12 offset-md-0 col-lg-10">
                    <div class="art-content">
                        <div class="art-title">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="art-author">By <a href="">@yield('author-name')</a></div>
                        <div class="art-bar"><div></div></div>

                        @component('components.post-social', ['class' => 'art-social-body'])
                            @slot('title')
                                @yield('title')
                            @endslot

                            @slot('authorTwitter')
                                @yield('author-twitter')
                            @endslot
                        @endcomponent

                        <div class="art-text">

                            @yield('post-content')

                        </div>
                        <div class="art-footer">
                            <hr class="hr-gray">
                            <div class="art-update">Updated @yield('updated')</div>
                            @component('components.post-social', ['class' => 'art-share'])
                                @slot('title')
                                    @yield('title')
                                @endslot

                                @slot('authorTwitter')
                                    @yield('author-twitter')
                                @endslot

                                <p>Spread the word!</p>
                            @endcomponent
                        </div>
                    </div>

                    @component('components.post-author')
                        @slot('photo')
                            @yield('author-photo')
                        @endslot

                        @slot('name')
                            @yield('author-name')
                        @endslot

                        @yield('author-bio')
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
@endsection
