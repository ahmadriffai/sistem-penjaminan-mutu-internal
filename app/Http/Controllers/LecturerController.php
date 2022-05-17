<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Service\LecturerService;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    private LecturerService $lecturerService;

    public function __construct(LecturerService $lecturerService)
    {
        $this->lecturerService = $lecturerService;
    }

    public function create() {
        $title = 'Tambah Data Dosen';

        return view('lecturer.create', compact('title'));
    }

}
