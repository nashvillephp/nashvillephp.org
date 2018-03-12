@component('mail::message')
{{ $proposal->getSpeakerName() }},

Thank you for submitting a proposal to speak at an upcoming Nashville PHP
meeting! We’re excited you want to share with our group, and we look forward
to working with you. The details of your submission are below. Let us know
if anything is missing or needs to be changed.

You should hear from us soon. If you have any questions in the meantime,
feel free to reply to this message.

{{ config('mail.signature') }}

---

# Proposal Details

## Talk Title

{{ $proposal->getTalkTitle() }}

## Talk Abstract

{{ $proposal->getTalkAbstract() }}

## Your Name

{{ $proposal->getSpeakerName() }}

## Your Public Biography

{{ $proposal->getSpeakerBio() }}

## Your Picture

@if ($proposal->getSpeakerPhotoUrl())
{{ $proposal->getSpeakerPhotoUrl() }}
@else
*No photo uploaded.*
@endif

## Availability

{{ $proposal->getSpeakerAvailability() ?? '*Left blank.*' }}

## Additional Notes

{{ $proposal->getSpeakerNotes() ?? '*Left blank.*' }}
@endcomponent
