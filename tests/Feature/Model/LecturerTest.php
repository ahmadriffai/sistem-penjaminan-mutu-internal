<?php

namespace Tests\Feature\Model;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

class LecturerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_uuid_lecturer()
    {
        $lecturer = Lecturer::factory()->create();

        $lecturer = Lecturer::first();

        assertNotNull($lecturer->id);
        assertIsString($lecturer->id);
    }

    public function test_lecture_has_a_user()
    {
        $user = User::factory()->create();
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        
        $user = $lecturer->user;
        
        // Method 1:
        $this->assertDatabaseHas('lecturers', [
            'id' => $lecturer->id,
            'user_id' => $user->id
        ]);
        
        // Method 2:
        $this->assertEquals(1, $lecturer->user->count()); 
    }
}
