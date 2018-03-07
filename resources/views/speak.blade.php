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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis arcu ut lacus maximus consectetur. Praesent mattis, augue imperdiet ornare ornare, urna eros cursus dui, a vehicula odio lectus et neque. Curabitur at cursus elit. Quisque ac erat fermentum, varius lectus in, tincidunt orci.</p>

                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <fieldset>

                                <legend>Submit a talk proposal</legend>

                                <label>
                                    Your name:
                                    <input type="text" name="name" value="{{ old('name') }}">
                                </label>

                                <label>
                                    Your email address:
                                    <input type="email" name="email" value="{{ old('email') }}">
                                </label>

                                <label>
                                    Tell us about yourself (the bio you want to display on our website):
                                    <textarea name="bio">{{ old('bio') }}</textarea>
                                </label>

                                <label>
                                    Your avatar (1:1 aspect ratio):
                                    <input type="file" name="avatar">
                                </label>

                                <label>
                                    Talk title:
                                    <input type="text" name="title" value="{{ old('title') }}">
                                </label>

                                <label>
                                    Talk abstract:
                                    <textarea name="abstract">{{ old('abstract') }}</textarea>
                                </label>

                                <label>
                                    When are you available to give this talk?
                                    <input type="text" name="availability" value="{{ old('availability') }}">
                                </label>

                                <label>
                                    Is there anything else you'd like to tell us about yourself or your talk?
                                    <textarea name="notes">{{ old('notes') }}</textarea>
                                </label>

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
