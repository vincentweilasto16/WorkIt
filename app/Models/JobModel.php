<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table = 'job';
    protected $primaryKey = 'jobId';
    protected $useTimestamps = true;
    protected $allowedFields = ['jobName', 'jobDescription', 'status', 'userId'];

    public function getJob()
    {
        $builder = $this->table('job');
        $builder->select('*');
        $builder->join('users', 'userId = users.id');
        $builder->where('job.status', 2);
        $query = $builder->get();
        return $query->getResultArray();
    }

    // public function getJob()
    // {
    //     $builder = $this->table('job');
    //     $builder->select('job.jobId, job.jobName, job.jobDescription, job.status, users.userImage, users.companyName');
    //     $builder->join('users', 'userId = users.id');
    //     $builder->join('history', 'history.jobId = job.jobId', 'left outer');
    //     $builder->where('job.status', 2);
    //     $builder->where('history.jobId', null);
    //     $builder->where('history.userId !=', user()->id);
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    function getJobById($jobId)
    {
        $builder = $this->table('job');
        $builder->select('*');
        $builder->where('job.jobId', $jobId);
        $builder->where('userId', user()->id);
        $builder->orderBy('job.jobId', 'ASC');
        $query = $builder->get();
        return $query->getRow();
    }


    public function getCompanyJob()
    {
        $builder = $this->table('job');
        $builder->select('jobName, jobDescription, status.status as statName, jobId, job.status');
        $builder->join('users', 'userId = users.id');
        $builder->join('status', 'job.status = status.statusId');
        $builder->where('users.id', user()->id);
        $builder->orderBy('job.jobId', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJobDetail($jobId)
    {
        $builder = $this->table('job');
        $builder->select('*');
        $builder->join('history', 'history.jobId = job.jobId');
        $builder->join('users', 'users.id = history.userId');
        $builder->where('job.userId', user()->id);
        $builder->where('job.jobId', $jobId);
        // $builder->orderBy('job.jobId', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
