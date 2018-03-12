@extends('layouts.app')

@section('content')
<div class="page-content-cont">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-1"></div>
            <div class="col-md-12 offset-md-0 col-lg-10">
                <div class="page-content">
                    <div class="page-title">
                        <h1>Speak at Nashville PHP!</h1>
                    </div>
                    <div class="page-bar"><div></div></div>
                    <div class="page-text">

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

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis arcu ut lacus maximus consectetur. Praesent mattis, augue imperdiet ornare ornare, urna eros cursus dui, a vehicula odio lectus et neque. Curabitur at cursus elit. Quisque ac erat fermentum, varius lectus in, tincidunt orci.</p>

                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <fieldset>

                                <legend>Submit a talk proposal</legend>

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
                                    <small id="talkAbstractHelp" class="form-text text-muted">An abstract is a brief description of your talk and what it will cover. For help creating your abstract, check out <a href="https://helpmeabstract.com/">Help Me Abstract</a>.</small>
                                </div>

                                <div class="form-group">
                                    <label for="talkAvailability">When are you available to give this talk?</label>
                                    <input id="talkAvailability" name="availability" value="{{ old('availability') }}" type="text" class="form-control {{ $errors->has('availability') ? 'is-invalid' : '' }}" aria-describedby="talkAvailabilityHelp">
                                    <div class="invalid-feedback">{{ $errors->first('availability') }}</div>
                                    <small id="talkAvailabilityHelp" class="form-text text-muted">Our meetings are always the second Tuesday of each month. In what future month(s) are you available to present this talk?</small>
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

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
