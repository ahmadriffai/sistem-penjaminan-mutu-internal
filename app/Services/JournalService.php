<?php

namespace App\Services;

use App\Http\Requests\JournalAddServiceRequest;
use App\Models\Journal;
use App\Models\Lecturer;
use App\Models\SchoolYear;

interface JournalService
{
    public function addJournal(JournalAddServiceRequest $request): Journal;
}
