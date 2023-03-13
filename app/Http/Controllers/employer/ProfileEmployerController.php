<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\candidate\ProfileService;
use App\Http\Requests\UpdateProfileRequest;

class ProfileEmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        //
        $user = $this->profileService->getInfoUser();
        return view('candidate.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request, string $id)
    {
        //
        $request = $request->only(['id', 'user_name', 'phone_number', 'degree', 'experience']);
        $data= $this->profileService->updateInfo($request);
        return redirect(route('profileEmployer.index'));
    }
}
