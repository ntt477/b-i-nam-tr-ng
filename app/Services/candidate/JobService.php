<?php

namespace App\Services\candidate;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;


class JobService
{
     protected $job;
     protected $cv;

     public function __construct(Job $job, Cv $cv)
     {
          $this->job = $job;
          $this->cv = $cv;
     }

     public function getJob()
     {
          $jobs = $this->job->getJob();
          return $jobs;
     }

     public function getSearchJob()
     {
          $jobs = $this->job->getSearchJob();
          $idMainCv = $this->cv->getMainCv();
          return ['jobs'=>$jobs, 'idMainCv'=>$idMainCv];
     }
     
}
