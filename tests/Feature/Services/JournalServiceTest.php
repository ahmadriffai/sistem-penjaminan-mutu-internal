<?php

namespace Tests\Feature\Services;

use App\Http\Requests\JournalAddServiceRequest;
use App\Models\Journal;
use App\Models\Lecturer;
use App\Models\SchoolYear;
use App\Services\JournalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JournalServiceTest extends TestCase
{
    use RefreshDatabase;

    private JournalService $journalService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->journalService = $this->app->make(JournalService::class);
    }


    public function test_provider_service_lecture()
    {
        $this->assertTrue(true);
    }

    public function test_journal_save_success()
    {
        $lecturer = Lecturer::factory()->create();
        $schoolYear = SchoolYear::factory()->create();

        $param = [
            'title' => 'test',
            'link' => 'http://link.pdf',
            'year' => 2022,
            'month' => 'juli',
            'media' => 'online',
            'issn' => 'test',
            'criteria' => 'nasional',
            'category' => 'penelitian',
            'lecturer_id' => $lecturer->id,
            'school_year_id' => $schoolYear->id,
        ];

        $request = new JournalAddServiceRequest($param);
        $result = $this->journalService->addJournal($request);

        $journal = Journal::first();

        $this->assertNotNull($journal->id);
        self::assertSame($result->id , $journal->id);
        self::assertSame($result->issn , $journal->issn);
        self::assertEquals(0,$journal->isAccept);
        self::assertSame($lecturer->id, $journal->lecturer_id);
        self::assertSame($schoolYear->id, $journal->school_year_id);

    }


}
