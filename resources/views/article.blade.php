@extends('layouts.post')

@section('image-url', asset('images/placeholder02.jpg'))
@section('image-source', 'Rob Allen')

@section('title', 'Learn To Test Like A Grumpy Programmer')
@section('published', 'May 29, 2015')
@section('updated', 'May 29, 2015')

@section('author-name', 'Ben Ramsey')
@section('author-photo', asset('images/placeholder03.jpg'))
@section('author-twitter', '@ramsey')
@section('author-bio')
    Ben Ramsey is a web craftsman, author, and speaker. He builds a platform for professional photographers at <a href="">ShootProof</a>, organizes user groups, and lives in Nashville, TN with his wife, son, and dog named Echo. Ben blogs at benramsey.com and is <a href="https://twitter.com/ramsey">@ramsey</a> on Twitter.
@endsection

@section('post-content')
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
@endsection
