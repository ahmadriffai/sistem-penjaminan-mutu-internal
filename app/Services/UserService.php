<?php

namespace App\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;

interface UserService {
    function getUsers();
    function createUser(UserCreateRequest $request): User;
    function editUser(UserEditRequest $request): void;
}
