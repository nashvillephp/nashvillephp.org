@if ($url)
    <style type="text/css">
        .art-img::after {
            background: url({{ $url }});
            background-size: cover;
            background-position: center;
        }
    </style>
@endif

<div class="art-img-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-10 offset-lg-1">
                <div class="art-img">
                    @if ($source)
                    <div class="img-source">Image source: {{ $source }}</div>
                    @endif
                    <div class="img-corner"></div>
                    <img class="img-arrows" src="{{ asset('images/blog-arrows.svg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
