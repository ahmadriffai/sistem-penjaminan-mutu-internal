<?php

namespace App\Service\Eloquent;

use App\Http\Requests\LecturerAddRequest;
use App\Models\Lecturer;
use App\Service\LecturerService;
use Illuminate\Support\Str;

class LecturerServiceImpl implements LecturerService {
    public function addLecturer(LecturerAddRequest $request): void
    {
        $birthday = strtotime($request->input('birthday'));

        Lecturer::create([
            'id' => Str::uuid(),
            'nidn' => $request->input('nidn'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'birthday' => $birthday,
            'image' => null,
            'gender' => $request->input('gender'),
            'major' => $request->input('major'),
        ]);
    }
}