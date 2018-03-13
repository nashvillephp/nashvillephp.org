@php
    $iconPrefix = 'icon-';
    if ($class == 'art-share'):
        $iconPrefix = 'ico-share-';
    endif;
@endphp

<div class="{{ $class }}">
    {{ $slot }}
    <a target="_blank" href="https://twitter.com/intent/tweet?text={!! urlencode('Check out "' . $title . '"') !!}&url={!! urlencode(url()->current()) !!}&via=nashvillephp&related={!! urlencode(str_replace('@', '', $authorTwitter) . ':Author') !!}"><img class="social-twitter" src="{{ asset('images/' . $iconPrefix . 'twitter.svg') }}"></a>
    <a href=""><img class="social-facebook" src="{{ asset('images/' . $iconPrefix . 'facebook.svg') }}"></a>
    <a href=""><img class="social-google" src="{{ asset('images/' . $iconPrefix . 'google.svg') }}"></a>
</div>
