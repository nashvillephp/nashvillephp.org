<?php
declare(strict_types=1);

namespace Tests\Unit\Mail;

use App\Mail\ProposalReceived;
use App\TalkProposal;
use Google_Service_Sheets_Spreadsheet as GoogleSheet;
use Mockery;
use Tests\TestCase;

class ProposalReceivedTest extends TestCase
{
    public function testBuild()
    {
        $sheet = Mockery::mock(GoogleSheet::class);
        $proposal = Mockery::mock(TalkProposal::class, [
            'getSpeakerEmail' => 'foo@example.com',
            'getTalkTitle' => 'Foo Bar',
        ]);

        $message = Mockery::mock(ProposalReceived::class, [$sheet, $proposal]);
        $message->shouldReceive('build')->passthru();

        $message
            ->shouldReceive('markdown')
            ->once()
            ->with('emails.proposals.received')
            ->andReturn(
                Mockery::mock()
                    ->shouldReceive('replyTo')
                    ->once()
                    ->with([
                        'foo@example.com',
                        config('mail.replyTo.address')
                    ])
                    ->andReturn(
                        Mockery::mock()
                            ->shouldReceive('subject')
                            ->once()
                            ->with('New Talk Proposal: Foo Bar')
                            ->andReturn('foo')
                            ->getMock()
                    )
                    ->getMock()
            );

        $this->assertEquals('foo', $message->build());
    }
}
