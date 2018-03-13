<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\ProposalConfirmation;
use App\Mail\ProposalReceived;
use Google_Service_Sheets;
use Google_Service_Sheets_Spreadsheet as GoogleSheet;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;

class ProcessProposalFormDataTest extends TestCase
{
    public function testProposalFormPageLoads()
    {
        $response = $this->get('/speak');

        $response->assertStatus(200);
        $response->assertSeeText('Speak at Nashville PHP!');
    }

    public function testProcessFormData()
    {
        Mail::fake();

        $sheetsService = Mockery::mock(Google_Service_Sheets::class);

        $sheetsService->spreadsheets = Mockery::mock([
            'get' => Mockery::mock(GoogleSheet::class),
        ]);

        $sheetsService->spreadsheets_values = Mockery::mock([
            'append' => true,
        ]);

        $this->app->instance(Google_Service_Sheets::class, $sheetsService);

        $input = [
            'name' => 'Frodo Baggins',
            'email' => 'frodo@example.com',
            'bio' => 'I am the Ring Bearer.',
            'avatar' => UploadedFile::fake()->image('avatar.jpg'),
            'title' => 'My Trip To Mordor',
            'abstract' => 'Sam and I walked into Mordor and threw a ring into a volcano.',
            'availability' => 'Next month',
            'notes' => 'I do not wear shoes.',
        ];

        $response = $this->post('/speak', $input);
        $response->assertStatus(302);

        Mail::assertSent(ProposalConfirmation::class, function ($mail) use ($input) {
            $mail->build();
            return $mail->hasTo($input['email'])
                && $mail->hasReplyTo(config('mail.replyTo.address'))
                && $mail->subject === 'Your Nashville PHP Talk Proposal: ' . $input['title'];
        });

        Mail::assertSent(ProposalReceived::class, function ($mail) use ($input) {
            $mail->build();
            return $mail->hasTo(config('mail.proposals.address'))
                && $mail->hasReplyTo($input['email'])
                && $mail->hasReplyTo(config('mail.replyTo.address'))
                && $mail->subject === 'New Talk Proposal: ' . $input['title'];
        });
    }
}
