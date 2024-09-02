<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'requirement',
        'location',
        'jobType',
        'salary',
        'description',
        'companyName',
        'email',
        'phone',
        'address',
        'companyLocation',
        'additionalInfo',
        
    ];
}
