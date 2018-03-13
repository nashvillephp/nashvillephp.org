<?php
declare(strict_types=1);

namespace App;

use App\Http\Requests\StoreTalkProposal;
use Camel\CaseTransformerInterface;

/**
 * Represents a talk proposal
 */
class TalkProposal
{
    use ValueObjectTrait;

    /**
     * The raw details for the proposal
     *
     * @var array
     */
    private $proposalDetails = [];

    /**
     * Creates an object from user input representing a talk proposal
     *
     * @param StoreTalkProposal $request The talk proposal HTTP request
     * @param CaseTransformerInterface $caseTransformer A transformer for converting method names
     */
    public function __construct(
        StoreTalkProposal $request,
        CaseTransformerInterface $caseTransformer
    ) {
        $this->proposalDetails = [
            'speaker_name' => $request->input('name'),
            'speaker_email' => $request->input('email'),
            'speaker_bio' => $request->input('bio'),
            'speaker_photo_url' => '',
            'speaker_availability' => $request->input('availability', ''),
            'speaker_notes' => $request->input('notes', ''),
            'talk_title' => $request->input('title'),
            'talk_abstract' => $request->input('abstract'),
            'submission_date' => gmdate('Y-m-d H:i:s'),
        ];

        $this->setCaseTransformer($caseTransformer);
    }

    /**
     * Sets the speaker photo URL
     *
     * @param string $url
     * @return void
     */
    public function setSpeakerPhotoUrl(string $url): void
    {
        $this->proposalDetails['speaker_photo_url'] = $url;
    }

    /**
     * Returns the raw array of proposal details
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->proposalDetails;
    }

    /**
     * Returns an array of proposal data for insertion in a Google Sheet
     *
     * @return array
     */
    public function getArrayForGoogleSheet(): array
    {
        return [
            $this->getSpeakerName(),
            $this->getTalkTitle(),
            $this->getSubmissionDate(),
            $this->getSpeakerEmail(),
            $this->getSpeakerBio(),
            '=IMAGE("' . $this->getSpeakerPhotoUrl() . '")',
            $this->getTalkAbstract(),
            $this->getSpeakerAvailability(),
            $this->getSpeakerNotes(),
        ];
    }
}
