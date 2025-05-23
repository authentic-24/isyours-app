<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{

    protected $table = 'job_types';


    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];
}