<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\UserCreateRequest;
use App\Jobs\SendMailjob;
use App\Models\Lecturer;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $title = 'User Management';
        $data = $this->userService->getUsers();
        return view('users.index',compact('data', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 1);
    }

    public function create()
    {
        $title = 'Tambah Pengguna';
        $roles = Role::pluck('name','name')->all();
        $lecturer = Lecturer::pluck('name', 'id');
        return view('users.create',compact('roles', 'title', 'lecturer'));
    }

    public function store(UserCreateRequest $request)
    {
        try {
            $user = $this->userService->createUser($request);
            dispatch(new SendMailjob($user, $user->password));
            return redirect()->route('users.index')
                        ->with('success','User baru berhasil dibuat, system telah akan mengirim username dan password melalui email');
        }catch (InvariantException $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        Lecturer::where('user_id', $id)->update([
            'user_id' => null
        ]);
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
