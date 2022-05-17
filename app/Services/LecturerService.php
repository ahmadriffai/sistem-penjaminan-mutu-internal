<?php

namespace App\Services;

use App\Http\Requests\LecturerAddRequest;

interface LecturerService {
    public function addLecturer(LecturerAddRequest $request): void;
}
