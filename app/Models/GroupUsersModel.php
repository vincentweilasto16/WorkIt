<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupUsersModel extends Model
{
    protected $table = 'auth_group_users';
    protected $allowedFields = [
        'group_id', 'user_id'
    ];
}
