<?php

namespace App\Service\Eloquent;

use App\Exceptions\InvariantException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Lecturer;
use App\Models\User;
use App\Service\UserService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService {
    public function getUsers()
    {
        return $users = User::paginate(5);
    }

    public function createUser(UserCreateRequest $request): User
    {

        $lecturer = Lecturer::find($request->input('lecturer_id'));
        var_dump($lecturer->user_id);

        if ($lecturer->user_id != null) {
            throw new InvariantException('Dosen sudah mendapatkan akun');
        }

        try {
            DB::beginTransaction();

            $password = uniqid();
            $passwordHashed = Hash::make($password);

            $user = new User();
            $user->name = uniqid('user-');
            $user->email = $request->input('email');
            $user->password = $passwordHashed;
            $user->save();

            $user->assignRole($request->input('roles'));

            $lecturer->user_id = $user->id;
            $lecturer->save();
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            var_dump($e);
        }
        $user->password = $password;
        return $user;
    }

    public function editUser(UserEditRequest $request): void
    {
        # code...
    }
}
