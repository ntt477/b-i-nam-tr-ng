<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'time',
        'company',
        'location',
        'description',
        'status',
    ];

    public static function getJob()
    {
        $job = Job::orderBy('title')->paginate(3);
        return $job;
    }

    public static function getSearchJob()
    {
        $title = request()->title;
        $time = request()->time;
        $location = request()->location;
        $jobs = Job::where('title', 'LIKE', '%' . $title . '%')
            ->Where('time', 'LIKE', '%' . $time . '%')
            ->Where('location', 'LIKE', '%' . $location . '%')
            ->paginate(3);
        return $jobs;
    }

    public static function getJobEmployer()
    {
        $jobs = User::find(Auth::id())->jobs()->orderBy('title')->paginate(2);
        return $jobs;
    }

    public static function createJob($data)
    {   
        $user = User::find(Auth::id());
        $jobs = $user->jobs()->create([
            'title' => $data['title'],
            'time' => $data['time'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return $jobs;
    }
}
