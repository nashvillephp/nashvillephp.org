<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Http\Requests\StoreTalkProposal;
use App\TalkProposal;
use Camel\CaseTransformer;
use Camel\CaseTransformerInterface;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use Mockery;
use phpmock\mockery\PHPMockery;
use Tests\TestCase;

class TalkProposalTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGetData()
    {
        $date = '2018-03-12 12:23:16';
        $gmdateMock = PHPMockery::mock('App', 'gmdate')->andReturn($date);

        $input = [
            'name' => 'Frodo Baggins',
            'email' => 'frodo@example.com',
            'bio' => 'I am the Ring Bearer.',
            'availability' => 'Next month',
            'notes' => 'I do not wear shoes.',
            'title' => 'My Trip To Mordor',
            'abstract' => 'Sam and I walked into Mordor and threw a ring into a volcano.',
        ];

        $expected = [
            'speaker_name' => $input['name'],
            'speaker_email' => $input['email'],
            'speaker_bio' => $input['bio'],
            'speaker_photo_url' => '',
            'speaker_availability' => $input['availability'],
            'speaker_notes' => $input['notes'],
            'talk_title' => $input['title'],
            'talk_abstract' => $input['abstract'],
            'submission_date' => $date,
        ];

        $request = Mockery::mock(StoreTalkProposal::class);

        $request
            ->shouldReceive('input')
            ->andReturnUsing(function ($param) use ($input) {
                return $input[$param] ?? null;
            });

        $caseTransformer = Mockery::mock(CaseTransformerInterface::class);

        $proposal = new TalkProposal($request, $caseTransformer);

        $this->assertSame($expected, $proposal->getData());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGetArrayForGoogleSheet()
    {
        $date = '2018-03-12 12:23:16';
        $gmdateMock = PHPMockery::mock('App', 'gmdate')->andReturn($date);

        $input = [
            'name' => 'Frodo Baggins',
            'email' => 'frodo@example.com',
            'bio' => 'I am the Ring Bearer.',
            'availability' => 'Next month',
            'notes' => 'I do not wear shoes.',
            'title' => 'My Trip To Mordor',
            'abstract' => 'Sam and I walked into Mordor and threw a ring into a volcano.',
        ];

        $expected = [
            $input['name'],
            $input['title'],
            $date,
            $input['email'],
            $input['bio'],
            '=IMAGE("http://example.com/photo.jpg")',
            $input['abstract'],
            $input['availability'],
            $input['notes'],
        ];

        $request = Mockery::mock(StoreTalkProposal::class);

        $request
            ->shouldReceive('input')
            ->andReturnUsing(function ($param) use ($input) {
                return $input[$param] ?? null;
            });

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());

        $proposal = new TalkProposal($request, $caseTransformer);
        $proposal->setSpeakerPhotoUrl('http://example.com/photo.jpg');

        $this->assertSame($expected, $proposal->getArrayForGoogleSheet());
    }
}
