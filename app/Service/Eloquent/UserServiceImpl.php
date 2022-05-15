<?php

namespace App\Service\Eloquent;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService {
    public function getUsers()
    {
        return $users = User::paginate(5);
    }

    public function createUser(UserCreateRequest $request): void
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        var_dump($input);
    }

    public function editUser(UserEditRequest $request): void
    {
        # code...
    }
}
