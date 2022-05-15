<?php

namespace App\Service;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

interface UserService {
    function getUsers();
    function createUser(UserCreateRequest $request): void;
    function editUser(UserEditRequest $request): void;
}