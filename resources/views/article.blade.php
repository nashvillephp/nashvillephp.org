@extends('layouts.app')

@section('content')
<!-- START OF ARTICLE IMAGE -->
<div class="art-img-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-10 offset-lg-1">
                <div class="art-img">
                    <div class="img-source">Image source: Rob Allen</div>
                    <div class="img-corner"></div>
                    <img class="img-arrows" src="{{ asset('images/blog-arrows.svg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF ARTICLE IMAGE  -->

<!-- START OF ARTICLE CONTENT -->
<div class="art-content-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-1">
                <div class="art-social-left">
                    <p><a href=""><img class="social-twitter" src="{{ asset('images/icon-twitter.svg') }}"></a></p>
                    <p><a href=""><img class="social-facebook" src="{{ asset('images/icon-facebook.svg') }}"></a></p>
                    <p><a href=""><img class="social-google" src="{{ asset('images/icon-google.svg') }}"></a></p>
                </div>
            </div>
            <div class="col-md-12 offset-md-0 col-lg-10">
                <div class="art-content">
                    <div class="art-title">
                        <h1>Learn To Test Like A Grumpy Programmer</h1>
                    </div>
                    <div class="art-author">By <a href="">Ben Ramsey</a></div>
                    <div class="art-bar"><div></div></div>
                    <div class="art-social-body">
                        <a href=""><img class="social-twitter" src="{{ asset('images/icon-twitter.svg') }}"></a>
                        <a href=""><img class="social-facebook" src="{{ asset('images/icon-facebook.svg') }}"></a>
                        <a href=""><img class="social-google" src="{{ asset('images/icon-google.svg') }}"></a>
                    </div>
                    <div class="art-text">
                        <p>Chris Hartjes—a.k.a. @grmpyprogrammer—is bringing his brand of Grumpy Learning to Nashville for a one-day testing workshop!</p>

                        <p>Chris will cover the fundamental building blocks of learning to write automated tests for your PHP code. This is an in-person workshop that will run between 5 and 6 hours. Attendees should have a laptop, be comfortable working with command-line tools, and have installed PHP 5.5+, PHPUnit and Mockery.</p>

                        <p>Lunch will be provided.</p>

                        <h3>When & Where</h3>

                        <p>Friday, July 24th from 10am to 4pm at Vaco Nashville.</p>

                        <p>5410 Maryland Way, Suite 460<br>
                        Brentwood TN, 37027</p>

                        <h3>Sign up!</h3>

                        <p>Tickets are $199 per person, and space is limited, so sign up today before all the seats are gone!</p>

                        <button class="nash-btn">Sign Up Now!</button>

                        <h3>Who</h3>

                        <p>Chris Hartjes has been building web applications of all shapes and sizes since 1998, ranging from catalogs of CD compilations for professional DJ’s to portal pages for large US cable television providers. Chris gives back to the programming communities that have helped him by mentoring, speaking at conferences, and by co-organizing TrueNorth PHP. As the author of two books on writing testable PHP code and using testing tools, he believes that testing and automation are secret weapons that organizations can use to deliver high-quality applications quickly. He works from his basement office in the snowy wilds of Canada.</p>

                        <h3>Sponsors</h3>

                        <small>Notice: If you or your company is interested in sponsoring a post-workshop happy hour, contact Ben Ramsey at ben@nashvillephp.org.</small>
                    </div>
                    <div class="art-footer">
                        <hr class="hr-gray">
                        <div class="art-update">Updated May 29, 2015</div>
                        <div class="art-share">
                            <p>Spread the word!</p>
                            <a href=""><img src="{{ asset('images/ico-share-twitter.svg') }}"></a>
                            <a href=""><img src="{{ asset('images/ico-share-facebook.svg') }}"></a>
                            <a href=""><img src="{{ asset('images/ico-share-google.svg') }}"></a>
                        </div>
                    </div>
                </div>

                <div class="art-written-by">
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="art-author-photo"></div>
                            </div>
                            <div class="col-md-9">
                                <p>Written by</p>
                                <h3>Ben Ramsey</h3>
                                <small>Ben Ramsey is a web craftsman, author, and speaker. He builds a platform for professional photographers at <a href="">ShootProof</a>, organizes user groups, and lives in Nashville, TN with his wife, son, and dog named Echo. Ben blogs at benramsey.com and is <a href="">@ramsey</a> on Twitter.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="art-disqus">
                    // add disqus here
                </div>

            </div>

        </div>
    </div>
</div>
<!-- END OF ARTICLE CONTENT -->
@endsection
