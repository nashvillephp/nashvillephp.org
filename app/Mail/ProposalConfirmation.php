<?php

namespace App\Mail;

use App\TalkProposal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var TalkProposal
     */
    public $proposal;

    /**
     * Create a new message instance.
     *
     * @param TalkProposal $proposal
     * @return void
     */
    public function __construct(TalkProposal $proposal)
    {
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
            ->markdown('emails.proposals.confirmation')
            ->replyTo(config('mail.replyTo.address'), config('mail.replyTo.name'))
            ->subject('Your Nashville PHP Talk Proposal: ' . $this->proposal->getTalkTitle());
    }
}
