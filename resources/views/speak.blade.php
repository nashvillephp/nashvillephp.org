@extends('layouts.page')

@section('title', 'Give a Talk')
@section('subtitle', 'Share what you know at a Nashville PHP meetup.')

@section('page-content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h3 class="alert-heading mt-0">Oops!</h3>
            <p class="mb-0">Your talk proposal is missing some information. Please provide the missing information indicated in the form below and re-submit the proposal. Thanks!</p>
        </div>
    @endif

    @if (session()->has('talkSubmission'))
        <div class="alert alert-success" role="alert">
            <h3 class="alert-heading mt-0">Proposal submitted!</h3>
            <p>Awesome! You successfully submitted your talk proposal. You should receive an email confirmation shortly, and you'll be hearing from us soon.</p>
            <p>If you don’t receive an email confirmation or hear from us in a few days, please drop us a line at <a href="mailto:organizers@nashvillephp.org">organizers@nashvillephp.org</a> to let us know.</p>
            <hr>
            <p class="mb-0">Since you’re still around, feel free to submit another talk proposal.</p>
        </div>
    @endif

    <p>We are looking for beginner, intermediate, and advanced topics. Whether you’re new to speaking or have many years under your belt, help out your fellow PHP developers, and share something you’ve learned.</p>

    <h3>New to speaking?</h3>
    <p>No worries. We’ve got your back. Speaking at a user group is a great way to build confidence and experience in public speaking and technical presentation.</p>
    <p>We’d love for you to speak, and we can pair you with a seasoned speaker who can help make sure you’re prepared to give your first talk. Let us know if this interests you.</p>

    <h3>Need a few ideas?</h3>
    <p>Not convinced you have a good idea for a talk? Here are a few ideas to get you thinking about what you can share, but don’t limit yourself to these.</p>
    <ul>
        <li>Encounter a head-scratching bug? Share how you solved it.</li>
        <li>Find a cool library or tool? Teach us how to use it.</li>
        <li>Passionate about team building? Let us know how your team works.</li>
        <li>Discover a neat PHP trick? Show us how it works.</li>
    </ul>
    <p>If you’re still not sure, or if you have any questions, don’t hesitate to get in touch. Send us an email at <a href="mailto:organizers@nashvillephp.org">organizers@nashvillephp.org</a>.</p>

    <hr>

    <h2>Submit a talk proposal</h2>

    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <fieldset>

            <div class="form-group">
                <label for="speakerName">Your Name</label>
                <input id="speakerName" name="name" value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group">
                <label for="speakerEmail">Your Email Address</label>
                <input id="speakerEmail" name="email" value="{{ old('email') }}" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group">
                <label for="speakerBio">Your Public Biography</label>
                <textarea id="speakerBio" name="bio" rows="3" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" aria-describedby="speakerBioHelp">{{ old('bio') }}</textarea>
                <div class="invalid-feedback">{{ $errors->first('bio') }}</div>
                <small id="speakerBioHelp" class="form-text text-muted">This biography will appear alongside the meeting details.</small>
            </div>

            <div class="form-group">
                Your Picture
                <div class="custom-file">
                    <input id="speakerAvatar" name="avatar" type="file" class="custom-file-input {{ $errors->has('avatar') ? 'is-invalid' : '' }}" aria-describedby="speakerAvatarHelp" accept="image/*">
                    <label class="custom-file-label" for="speakerAvatar">Choose image</label>
                    <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                </div>
                <small id="speakerAvatarHelp" class="form-text text-muted">Your photo should have a 1:1 aspect ratio and be no larger than 1000x1000 pixels or 1 MB.</small>
            </div>

            <div class="form-group">
                <label for="talkTitle">Talk Title</label>
                <input id="talkTitle" name="title" value="{{ old('title') }}" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            </div>

            <div class="form-group">
                <label for="talkAbstract">Talk Abstract</label>
                <textarea id="talkAbstract" name="abstract" rows="6" class="form-control {{ $errors->has('abstract') ? 'is-invalid' : '' }}" aria-describedby="talkAbstractHelp">{{ old('abstract') }}</textarea>
                <div class="invalid-feedback">{{ $errors->first('abstract') }}</div>
                <small id="talkAbstractHelp" class="form-text text-muted">An abstract is a brief description of your talk and what it will cover. For help creating your abstract, check out <a href="https://helpmeabstract.com/" target="_blank">Help Me Abstract</a>.</small>
            </div>

            <div class="form-group">
                <label for="talkAvailability">When are you available to give this talk?</label>
                <input id="talkAvailability" name="availability" value="{{ old('availability') }}" type="text" class="form-control {{ $errors->has('availability') ? 'is-invalid' : '' }}" aria-describedby="talkAvailabilityHelp">
                <div class="invalid-feedback">{{ $errors->first('availability') }}</div>
                <small id="talkAvailabilityHelp" class="form-text text-muted">Our meetings are always the second Tuesday of each month. In what future month(s) are you available to present this talk? Examples: January 2016, Summer, Anytime.</small>
            </div>

            <div class="form-group">
                <label for="speakerNotes">Is there anything else you’d like to tell us about yourself or your talk?</label>
                <textarea id="speakerNotes" name="notes" rows="3" class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" aria-describedby="speakerNotesHelp">{{ old('notes') }}</textarea>
                <div class="invalid-feedback">{{ $errors->first('notes') }}</div>
                <small id="speakerNotesHelp" class="form-text text-muted">Have you given this talk before? If so, is there a video online where we can view it? Are you a first-time speaker and need some help preparing? We’ll be happy to help! Do you have any other requests?</small>
            </div>

            <button type="submit" class="nash-btn">Submit Your Talk!</button>

        </fieldset>
    </form>
@endsection
