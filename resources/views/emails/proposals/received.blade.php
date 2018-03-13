@component('mail::message')
**{{ $proposal->getSpeakerName() }}** submitted a new talk proposal!

If you have any questions for them, you may reply directly to this message.

@component('mail::button', ['url' => $sheet->spreadsheetUrl, 'color' => 'blue'])
View Proposals
@endcomponent

@component('mail::panel')
# {{ $proposal->getTalkTitle() }}

{{ $proposal->getTalkAbstract() }}
@endcomponent

---

# More Details

## Name

{{ $proposal->getSpeakerName() }}

## Bio

{{ $proposal->getSpeakerBio() }}

## Photo

@if ($proposal->getSpeakerPhotoUrl())
<img src="{{ $proposal->getSpeakerPhotoUrl() }}" style="max-height:200px;max-width:200px;height:auto;width:auto;">
@else
*No photo uploaded.*
@endif

## Availability

{{ $proposal->getSpeakerAvailability() ?? '*Left blank.*' }}

## Additional Notes

{{ $proposal->getSpeakerNotes() ?? '*Left blank.*' }}
@endcomponent
