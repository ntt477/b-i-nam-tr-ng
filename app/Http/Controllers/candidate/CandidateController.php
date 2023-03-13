<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Services\candidate\JobService;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        //
        $jobs = $this->jobService->getJob();
        return view('candidate.index', compact('jobs'));
    }
}
