<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_profiles';

    protected $fillable = [
        'user_id',
        'experience_id',
        'skill_id',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}