<?php

namespace Tests\Feature\Services;

use App\Exceptions\InvariantException;
use App\Http\Requests\UserCreateRequest;
use App\Models\Lecturer;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testGetUser()
    {
        User::factory()->count(3)->create();
        $users = $this->userService->getUsers();

        assertSame(3,$users->count());
    }

    public function test_add_user_with_user_exist()
    {
        $this->expectException(InvariantException::class);


        $user = User::factory()->create();
        $lecturer = Lecturer::factory()->create(['user_id' => $user->id]);
        $param = [
            'lecturer_id' => $lecturer->id,
            'email' => 'mail@mail.com',
            'roles' => ['role create'],
        ];

        $request = new UserCreateRequest($param);
        $this->userService->createUser($request);
    }
}
