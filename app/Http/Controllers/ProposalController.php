<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreTalkProposal;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Illuminate\Http\RedirectResponse;
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
        Google_Service_Sheets $sheetsService
    ): RedirectResponse {

        $values = [
            $request->input('name'),
            $request->input('title'),
            gmdate('Y-m-d H:i:s'),
            $request->input('email'),
            $request->input('bio'),
            '',
            $request->input('abstract'),
            $request->input('availability', ''),
            $request->input('notes', ''),
        ];

        $values = new Google_Service_Sheets_ValueRange([
            'values' => [$values],
        ]);

        $result = $sheetsService->spreadsheets_values->append(
            config('google.proposals_spreadsheet_id'),
            'A1:J1',
            $values,
            ['valueInputOption' => 'USER_ENTERED']
        );

        return redirect('speak')->with('talkSubmission', 1);
    }
}
