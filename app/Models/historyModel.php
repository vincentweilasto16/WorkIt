<?php

namespace App\Models;

use CodeIgniter\Model;

class historyModel extends Model
{
    protected $table = 'history';
    protected $useTimestamps = true;
    protected $primaryKey = 'historyId';
    protected $allowedFields = ['historyId', 'userId', 'jobId', 'userStatId'];

    public function getHistory()
    {
        $builder = $this->table('history');
        $builder->select('users.companyName, jobName, users.userImage, userstatus.userStatusName');
        $builder->join('job', 'job.jobId = history.jobId');
        $builder->join('users', 'users.Id = job.userId');
        $builder->join('userstatus', 'history.userStatId = userstatus.userStatusId');
        $builder->where('history.userId', user()->id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    // public function getStatusUser($historyId)
    // {
    //     $builder = $this->table('history');
    //     $builder->select('*');
    //     $builder->join('job', 'history.jobId = job.jobId');
    //     $builder->join('users', 'users.id = history.userId');
    //     $builder->where('job.userId', user()->id);
    //     $builder->where('history.historyId', $historyId);
    //     // $builder->orderBy('job.jobId', 'ASC');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // public function getJobIdByHistoryId($historyId)
    // {
    //     $builder = $this->table('history');
    //     $builder->select('history.jobId');
    //     $builder->join('job', 'history.jobId = job.jobId');
    //     $builder->join('users', 'users.id = history.userId');
    //     $builder->where('job.userId', user()->id);
    //     $builder->where('history.historyId', $historyId);
    //     // $builder->orderBy('job.jobId', 'ASC');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
}
