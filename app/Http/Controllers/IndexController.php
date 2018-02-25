<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\NextMeetup;
use Camel\CaseTransformer;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use Illuminate\View\View;

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
     */
    public function __construct(
        MeetupKeyAuthClient $meetupClient,
        CaseTransformer $caseTransformer
    ) {
        $this->meetupClient = $meetupClient;
        $this->caseTransformer = $caseTransformer;
    }

    /**
     * The root home page
     *
     * @return View
     */
    public function home(): View
    {
        return view('home', [
            'nextMeetup' => new NextMeetup(
                $this->meetupClient,
                $this->caseTransformer
            ),
        ]);
    }
}
