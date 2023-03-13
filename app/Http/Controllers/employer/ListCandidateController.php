<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CvUser;
use Illuminate\Support\Facades\Auth;


class ListCandidateController extends Controller
{
    //
    public function index() {
        return view('employer.list_candidate');
    }
}
