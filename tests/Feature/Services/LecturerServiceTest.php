<?php

namespace Tests\Feature\Services;

use App\Http\Requests\LecturerAddRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Lecturer;
use App\Service\LecturerService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LecturerServiceTest extends TestCase
{
    use RefreshDatabase;

    private LecturerService $lecturerService;
    private $addRules;
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->addRules = (new LecturerAddRequest())->rules();
        $this->validator = $this->app['validator'];

        $this->lecturerService = $this->app->make(LecturerService::class);
    }

    protected function validateField(string $field, $value): bool
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->addRules[$field]]
        )->passes();
    }

    public function test_provider_service_lecture()
    {
        $this->assertTrue(true);
    }

    public function test_add_lecturer_invalid_request() {
    
        $this->expectException(ValidationException::class);

        $request = new LecturerAddRequest([]);
        $request
            ->setContainer(app())
            ->setRedirector(app(Redirector::class))
            ->validateResolved();

        $this->lecturerService->addLecturer($request);
    }

    public function test_add_lecture_valid_request() {
        $param = [
            'nidn' => '20201910',
            'name' => 'Rifai',
            'address' => 'Rejosari',
            'phone' => '000',
            'birthday' => '01-01-2002',
            'gender' => 'M',
            'major' => 'TI'
        ];

        $request = new LecturerAddRequest($param);
        $this->lecturerService->addLecturer($request);

        $lecturer = Lecturer::first();

        $this->assertSame($param['nidn'], $lecturer->nidn);
        $this->assertNotNull($lecturer->id);
    }

}
