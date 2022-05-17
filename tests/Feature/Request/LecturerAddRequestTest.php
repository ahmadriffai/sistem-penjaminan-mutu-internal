<?php

namespace Tests\Feature\Request;

use App\Http\Requests\LecturerAddRequest;
use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LecturerAddRequestTest extends TestCase
{
    use RefreshDatabase;

    private $addRules;
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->addRules = (new LecturerAddRequest())->rules();
        $this->validator = $this->app['validator'];
    }

    protected function validateField(string $field, $value): bool
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->addRules[$field]]
        )->passes();
    }

    public function test_add_request_nidn_validate() {

        Lecturer::factory()->create(['nidn' => '1234']);

        $this->assertFalse($this->validateField('nidn', ''));
        $this->assertFalse($this->validateField('nidn', '1234'));
        $this->assertTrue($this->validateField('nidn', '123456'));
    }

    public function test_add_request_other_field()
    {
        
        $this->assertFalse($this->validateField('name', ''));
        $this->assertFalse($this->validateField('address', ''));
        $this->assertFalse($this->validateField('phone', ''));
        $this->assertFalse($this->validateField('birthday', ''));
        $this->assertFalse($this->validateField('gender', ''));
        $this->assertFalse($this->validateField('major', ''));
        
    }
}
