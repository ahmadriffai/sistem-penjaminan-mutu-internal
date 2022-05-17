<?php

namespace App\Services\Eloquent;

use App\Http\Requests\JournalAddServiceRequest;
use App\Models\Journal;
use App\Models\Lecturer;
use App\Models\SchoolYear;
use App\Services\JournalService;
use Illuminate\Support\Facades\DB;

class JournalServiceImpl implements JournalService
{

    public function addJournal(JournalAddServiceRequest $request): Journal
    {
        $lecturer = Lecturer::find($request->input('lecturer_id'));
        $schoolYear = SchoolYear::find($request->input('school_year_id'));
        try {
            DB::beginTransaction();

            $journal = new Journal();
            $journal->title = $request->input('title');
            $journal->link = $request->input('link');
            $journal->year = $request->input('year');
            $journal->month = $request->input('month');
            $journal->media = $request->input('media');
            $journal->issn = $request->input('issn');
            $journal->category = $request->input('category');
            $journal->criteria = $request->input('criteria');

            $journal->lecturer()->associate($lecturer);
            $journal->schoolYear()->associate($schoolYear);
            $journal->save();

            DB::commit();
        }catch (\Exception $exception) {
            var_dump($exception->getMessage());
            DB::rollBack();
        }

        return $journal;
    }
}
