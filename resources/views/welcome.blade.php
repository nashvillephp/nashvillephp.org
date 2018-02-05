@extends('layouts.app')

@section('content')
<!-- START OF HERO -->
<div class="container-fluid bg-blue">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">
            <div class="nash-hero">
                <div class="nash-skyline">
                    <img class="skyline-static" src="{{ asset('images/skyline-static.svg') }}">
                    <svg class="skyline-helper" x="0px" y="0px" viewBox="0 0 760.8 331"></svg>
                    <svg class="skyline-dinamic" x="0px" y="0px" viewBox="0 0 760.8 331" style="enable-background:new 0 0 760.8 331;" xml:space="preserve">
                        <g class="anima4"><rect x="92.5" y="202.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -118.8755 128.0736)" class="st3" width="5.3" height="10.7"/><rect x="85.3" y="195.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -112.7565 123.9764)" class="st2" width="16" height="5.3"/></g>
                        <g class="anima4 de1a"><rect x="298.9" y="11.6" transform="matrix(0.7071 -0.7071 0.7071 0.7071 76.3301 218.2464)" class="st3" width="5.3" height="10.7"/><rect x="291.7" y="4.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 82.4502 214.1492)" class="st2" width="16" height="5.3"/></g>
                        <g class="anima4 de3a"><rect x="609.5" y="190.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 41.0345 490.132)" class="st3" width="5.3" height="10.7"/><rect x="602.3" y="183.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 47.155 486.0362)" class="st2" width="16" height="5.3"/></g>
                        <g class="anima4 de4"><rect x="752.5" y="201.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 75.1398 594.4697)" class="st3" width="5.3" height="10.7"/><rect x="745.3" y="194.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 81.2606 590.3745)" class="st2" width="16" height="5.3"/></g>
                        <g class="anima4 de1b"><rect x="550.9" y="99.6" transform="matrix(0.7071 -0.7071 0.7071 0.7071 87.9134 422.2112)" class="st3" width="5.3" height="10.7"/><rect x="543.7" y="92.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 94.034 418.115)" class="st2" width="16" height="5.3"/></g>
                        <g class="anima5 de3b"><rect x="143.9" y="48" transform="matrix(0.7071 0.7071 -0.7071 0.7071 78.7671 -88.7635)" class="st2" width="5.3" height="5.3"/><rect x="143.1" y="61.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.7195 123.6655)" class="st2" width="10.7" height="5.3"/><rect x="149.5" y="51" transform="matrix(0.7071 -0.7071 0.7071 0.7071 4.7238 124.1239)" class="st3" width="5.3" height="10.7"/></g>
                        <g class="anima5 de2"><rect x="1.1" y="138.4" transform="matrix(0.7071 0.7071 -0.7071 0.7071 100.8762 38.6576)" class="st2" width="5.3" height="5.3"/><rect x="0.3" y="151.6" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -107.4533 49.1987)" class="st2" width="10.7" height="5.3"/><rect x="6.8" y="141.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -101.0106 49.6569)" class="st3" width="5.3" height="10.7"/></g>
                        <g class="anima5 de5"><rect x="374.3" y="44.2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 143.5425 -252.8387)" class="st2" width="5.3" height="5.3"/><rect x="373.5" y="57.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 68.4959 285.4873)" class="st2" width="10.7" height="5.3"/><rect x="380" y="47.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 74.9397 285.9462)" class="st3" width="5.3" height="10.7"/></g>
                        <g class="anima5 de1c"><rect x="662.2" y="88" transform="matrix(0.7071 0.7071 -0.7071 0.7071 258.8717 -443.5759)" class="st2" width="5.3" height="5.3"/><rect x="661.4" y="101.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 121.8175 501.909)" class="st2" width="10.7" height="5.3"/><rect x="667.9" y="91" transform="matrix(0.7071 -0.7071 0.7071 0.7071 128.2618 502.3685)" class="st3" width="5.3" height="10.7"/></g>
                        <g class="anima2"><g class="anima1"><rect x="250.9" y="306.6" class="st2" width="5.3" height="2.9"/><rect x="241.2" y="296.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 542.2407 54.567)" class="st2" width="5.3" height="2.9"/><rect x="234.3" y="299.8" transform="matrix(0.7071 0.7071 -0.7071 0.7071 282.4216 -79.3372)" class="st2" width="5.3" height="2.9"/><rect x="248" y="313.5" transform="matrix(0.7071 0.7071 -0.7071 0.7071 296.1368 -85.0182)" class="st2" width="5.3" height="2.9"/><rect x="248" y="299.8" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 640.9742 336.9886)" class="st2" width="5.3" height="2.9"/><rect x="231.5" y="306.6" transform="matrix(-1 -8.994551e-11 8.994551e-11 -1 468.2775 616.204)" class="st2" width="5.3" height="2.9"/><rect x="241.2" y="316.3" transform="matrix(8.977358e-11 -1 1 8.977358e-11 -73.9633 561.637)" class="st2" width="5.3" height="2.9"/><rect x="234.3" y="313.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -153.3005 259.8192)" class="st2" width="5.3" height="2.9"/></g><polygon class="st2" points="243.8,308.1 231.5,303.6 231.5,298.8 219.1,294.3 219.1,290.9 206.8,286.4 195,286.4 195,281 165.9,281 165.9,286.4 133.6,286.4 133.6,294.3 120.4,294.3 120.4,314.8 109.2,314.8 114.7,320.2 247.8,320.2 247.8,314.1  "/><polygon class="st3" points="195,281 171.3,281 165.9,281 165.9,286.4 139,286.4 133.6,286.4 133.6,291.9 133.6,294.3 125.8,294.3 120.4,294.3 120.4,299.7 120.4,314.8 109.2,314.8 114.7,320.2 125.8,320.2 125.8,314.8 125.8,299.7 133.6,299.7 139,299.7 139,294.3 139,291.9 165.9,291.9 171.3,291.9 171.3,286.4 195,286.4 "/></g>
                        <polygon class="st3 anima3a" points="557.6,305.2 552.2,300 542.7,300 540.2,305.2 535,305.2 530.3,312.7 562.4,312.7 573.4,305.2 "/>
                        <polygon class="st3 anima3b" points="638.9,323.5 633.6,318.4 624.1,318.4 621.6,323.5 616.4,323.5 611.7,331 643.8,331 654.8,323.5 "/>
                    </svg>
                </div>

                <div class="text-box">
                    <h1>Welcome to Nashville PHP</h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore ma tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="nash-social">
                        <a href="https://github.com/nashvillephp"><img class="icon-git" src="{{ asset('images/icon-github.svg') }}"></a>
                        <a href="https://www.meetup.com/nashvillephp/"><img class="icon-meet" src="{{ asset('images/icon-meeting.svg') }}"></a>
                        <a href="https://twitter.com/nashvillephp"><img class="icon-twit" src="{{ asset('images/icon-twitter.svg') }}"></a>
                        <a href="https://www.facebook.com/groups/353865445079359/"><img class="icon-face" src="{{ asset('images/icon-facebook.svg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF HERO-->

<!-- START OF NEXT EVENT -->
<div class="angled-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-10 offset-lg-0 col-xl-8 offset-xl-1">
                <div class="slanted">
                    <div class="text-box-sm">
                        <div class="next-event h4">Next Event</div>
                        <h2>Title of Event</h2>
                        <hr class="blue-bar">
                        <p>Syntax Is Not Programming - Marcus Fulbright at 8pm on Tuesday, August 8.</p>
                    </div>
                    <div class="event-img">
                        <svg width="319px" height="299.6px">
                            <clipPath id="myClip">
                                <path d="M0,0 0,241 58.6,299.6 319,299.6 319,51.1 267.9,0 "/>
                            </clipPath>
                        </svg>
                    </div>
                    <button class="nash-btn mt-5">More details and RSVP</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF NEXT EVENT -->

<!-- START OF VIDEOS -->
<div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-0 col-lg-10 offset-lg-0 col-xl-6 offset-xl-1">
            <div class="slanted nash-videos">
                <div class="text-box-xs">
                    <h2>Check our last talks</h2>
                    <hr class="blue-bar">
                    <p>Text explaining that the talks are recorded and streamed live, inviting the developers to susbcribe to the group’s youtube channel.</p>
                </div>
                <div class="nash-video-container">
                    <div class="nash-video-wrapper">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/qwHXtqiiXu4?rel=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <button class="nash-btn mt-5">Subscribe to our YouTube Channel</button>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2 col-xl-4 offset-xl-0">
            <div class="slanted-sm speaker">
                <div class="">
                    <h2>Become a speaker</h2>
                    <hr class="blue-bar">
                    <p>Text explaining that the group is open to new speakers and inviting developers to submit a talk idea.</p>
                    <button class="nash-btn mt-2">Submit a Talk</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF VIDEOS -->

<!-- START OF THREE COLUMNS -->

<div class="container three-column">
    <div class="row">
        <div class="col-md-12">
            <div class="slanted">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-5-r">
                            <img class="icon-top" src="{{ asset('images/icon-gray-slack.svg') }}">
                            <h3>Slack Channel</h3>
                            <hr class="blue-bar">
                            <p>You can also find us in <strong>#php</strong> on the NashDev Slack channel.</p>
                            <p>Register NashDev Slack to join our discussions:</p>
                            <a href="http://nashdev.com/" class="nash-btn mt-2">Register</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-5-r">
                            <img class="icon-top" src="{{ asset('images/icon-gray-chat.svg') }}">
                            <h3>Realtime Conversation</h3>
                            <hr class="blue-bar">
                            <p>Join us in #nashvillephp on Freenode IRC throughout the day  for realtime conversation, and if you need PHP help, feel free to ask.</p>
                            <pre>Server: chat.freenode.net
Port: 6697 (SSL)
Channel: #nashvillephp</pre>
                            <p>For help with IRC, check out <a href="http://www.irchelp.org/">irchelp.org</a>.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <img class="icon-top" src="{{ asset('images/icon-gray-twitter.svg') }}">
                            <h3>Latest Tweets</h3>
                            <hr class="blue-bar"><br>
                            <a class="twitter-timeline"  href="https://twitter.com/search?q=%40nashvillephp" data-widget-id="908511029746896896">Tweets about @nashvillephp</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF THREE COLUMNS -->
@endsection
