<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostJobRequest;
use App\Services\employer\JobService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostJobController extends Controller
{
    //
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }
    public function index() {
        return view('employer.post_job');
        
    }

    public function create(PostJobRequest $request) {
        $request = $request->only(['title', 'time', 'status','location','description']);
        $data= $this->jobService->createJob($request);
        return redirect(route('employer.post_job'));
    }
}
