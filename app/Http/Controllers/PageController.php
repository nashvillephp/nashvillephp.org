<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\NextLunch;
use App\NextMeetup;
use Camel\CaseTransformer;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Exceptions\MeetupNotFoundException;
use Illuminate\View\View;
use League\CommonMark\Converter as MarkdownConverter;

class PageController extends Controller
{
    /**
     * The root home page
     *
     * @param MeetupKeyAuthClient $meetupClient
     * @param CaseTransformer $caseTransformer
     * @param MarkdownConverter $markdownConverter
     * @return View
     */
    public function home(
        MeetupKeyAuthClient $meetupClient,
        CaseTransformer $caseTransformer,
        MarkdownConverter $markdownConverter
    ): View {

        try {
            $nextLunch = new NextLunch($meetupClient, $caseTransformer);
        } catch (MeetupNotFoundException $e) {
            $nextLunch = null;
        }

        return view('home', [
            'markdown' => $markdownConverter,
            'nextMeetup' => new NextMeetup(
                $meetupClient,
                $caseTransformer
            ),
            'nextLunch' => $nextLunch,
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function sponsors(): View
    {
        return view('sponsors');
    }

    public function speakers(): View
    {
        return view('speakers');
    }
}
