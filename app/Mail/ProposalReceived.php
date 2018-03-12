<?php

namespace App\Mail;

use App\TalkProposal;
use Google_Service_Sheets_Spreadsheet as GoogleSheet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var GoogleSheet
     */
    public $sheet;

    /**
     * @var TalkProposal
     */
    public $proposal;

    /**
     * Create a new message instance.
     *
     * @param GoogleSheet $sheet
     * @param TalkProposal $proposal
     * @return void
     */
    public function __construct(GoogleSheet $sheet, TalkProposal $proposal)
    {
        $this->sheet = $sheet;
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.proposals.received')
            ->replyTo([
                $this->proposal->getSpeakerEmail(),
                config('mail.replyTo.address')
            ])
            ->subject('New Talk Proposal: ' . $this->proposal->getTalkTitle());
    }
}
