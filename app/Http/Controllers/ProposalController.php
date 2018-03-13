<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreTalkProposal;
use App\Mail\ProposalConfirmation;
use App\Mail\ProposalReceived;
use App\TalkProposal;
use Camel\CaseTransformer;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProposalController extends Controller
{
    /**
     * The talk submission page
     *
     * @return View
     */
    public function proposalForm(): View
    {
        return view('speak');
    }

    /**
     * Process talk submissions
     *
     * @param StoreTalkProposal $request
     * @param Google_Service_Sheets $sheetsService
     * @return RedirectResponse
     */
    public function processProposal(
        StoreTalkProposal $request,
        Google_Service_Sheets $sheetsService,
        CaseTransformer $caseTransformer
    ): RedirectResponse {

        $proposal = new TalkProposal($request, $caseTransformer);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = $request->avatar->store(
                'uploads/proposals/' . Str::slug($proposal->getSpeakerName()),
                [
                    'visibility' => 'public',
                    'StorageClass' => 'STANDARD_IA',
                ]
            );

            $proposal->setSpeakerPhotoUrl(Storage::url($path));
        }

        $sheet = $sheetsService->spreadsheets->get(
            config('google.proposals_spreadsheet_id')
        );

        $values = new Google_Service_Sheets_ValueRange([
            'values' => [$proposal->getArrayForGoogleSheet()],
        ]);

        $sheetsService->spreadsheets_values->append(
            config('google.proposals_spreadsheet_id'),
            'A1:J1',
            $values,
            ['valueInputOption' => 'USER_ENTERED']
        );

        Mail::to($proposal->getSpeakerEmail())->send(new ProposalConfirmation($proposal));
        Mail::to(config('mail.proposals.address'))->send(new ProposalReceived($sheet, $proposal));

        return redirect('speak')->with('talkSubmission', 1);
    }
}
