<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $table = 'job_titles';

    protected $fillable = [
        'name',
        'job_level_id',
    ];

    public function jobLevel()
    {
        return $this->belongsTo(JobLevel::class);
    }

}
