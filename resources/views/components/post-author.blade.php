@if ($photo)
    <style type="text/css">
        .art-author-photo::before {
            background: url({{ $photo }});
            background-size: cover;
            background-position: center;
        }
    </style>
@endif

<div class="art-written-by">
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="art-author-photo"></div>
            </div>
            <div class="col-md-9">
                <p>Written by</p>
                <h3>{{ $name }}</h3>
                <small>{{ $slot }}</small>
            </div>
        </div>
    </div>
</div>
