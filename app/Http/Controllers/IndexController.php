<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\NextMeetup;
use Camel\CaseTransformer;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use Illuminate\View\View;
use League\CommonMark\Converter as MarkdownConverter;

class IndexController extends Controller
{
    /**
     * @var MeetupKeyAuthClient
     */
    private $meetupClient;

    /**
     * @var CaseTransformer
     */
    private $caseTransformer;

    /**
     * @param MeetupKeyAuthClient $meetupClient
     * @param CaseTransformer $caseTransformer
     * @param MarkdownConverter $markdownConverter
     */
    public function __construct(
        MeetupKeyAuthClient $meetupClient,
        CaseTransformer $caseTransformer,
        MarkdownConverter $markdownConverter
    ) {
        $this->meetupClient = $meetupClient;
        $this->caseTransformer = $caseTransformer;
        $this->markdownConverter = $markdownConverter;
    }

    /**
     * The root home page
     *
     * @return View
     */
    public function home(): View
    {
        return view('home', [
            'markdown' => $this->markdownConverter,
            'nextMeetup' => new NextMeetup(
                $this->meetupClient,
                $this->caseTransformer
            ),
        ]);
    }
}
