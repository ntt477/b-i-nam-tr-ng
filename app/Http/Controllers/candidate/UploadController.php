<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\candidate\UploadService;

class UploadController extends Controller
{
    //
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }
    public function index()
    {
        return view('candidate.upload_cv');
    }

    public function uploadCV(UploadRequest $request)
    {   
        $data = $request->only(['user_id', 'title', 'upload']);
        $cv = $this->uploadService->uploadCv($data);
        if ($cv) {
            return redirect(route('candidate.your_cv'));
        }

        
    }
}
