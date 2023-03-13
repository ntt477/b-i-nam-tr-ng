<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\candidate\IndexService;
use Illuminate\Support\Facades\Storage;
use App\Models\Cv;
use App\Services\candidate\UploadService;

class YourCvController extends Controller
{
    //
    protected $indexService;
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {   
        $this->uploadService = $uploadService;
    }

    public function index() {
        $id = Cv::where('status', 1)->pluck('id');
        $cvs = $this->uploadService->getCv();
        return view('candidate.your_cv', compact('cvs', 'id'));
    }

    public function viewFile() {
        $request = request()->fileName;
        $viewFile = $this->uploadService->viewFile($request);
        return $viewFile;
    }

    public function pickMainCv(Request $request) {
        $request = $request->only('id');
        $pickMainCv = $this->uploadService->pickMainCv($request);
        return redirect(route('candidate.your_cv'));
    }

}
