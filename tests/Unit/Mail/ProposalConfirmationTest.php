<?php
declare(strict_types=1);

namespace Tests\Unit\Mail;

use App\Mail\ProposalConfirmation;
use App\TalkProposal;
use Mockery;
use Tests\TestCase;

class ProposalConfirmationTest extends TestCase
{
    public function testBuild()
    {
        $proposal = Mockery::mock(TalkProposal::class, [
            'getTalkTitle' => 'Foo Bar',
        ]);

        $message = Mockery::mock(ProposalConfirmation::class, [$proposal]);
        $message->shouldReceive('build')->passthru();

        $message
            ->shouldReceive('markdown')
            ->once()
            ->with('emails.proposals.confirmation')
            ->andReturn(
                Mockery::mock()
                    ->shouldReceive('replyTo')
                    ->once()
                    ->with(config('mail.replyTo.address'), config('mail.replyTo.name'))
                    ->andReturn(
                        Mockery::mock()
                            ->shouldReceive('subject')
                            ->once()
                            ->with('Your Nashville PHP Talk Proposal: Foo Bar')
                            ->andReturn('foo')
                            ->getMock()
                    )
                    ->getMock()
            );

        $this->assertEquals('foo', $message->build());
    }
}
