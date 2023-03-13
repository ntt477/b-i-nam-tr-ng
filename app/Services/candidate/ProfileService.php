<?php

namespace App\Services\candidate;

use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getInfoUser()
    {
        $infor = $this->user->getInfoUser();
        return $infor;
    }

    public function updateInfo($data)
    {
        $updateInfo = $this->user->updateInfo($data);
        return $updateInfo;
    }
}
