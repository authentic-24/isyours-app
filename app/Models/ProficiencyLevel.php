<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProficiencyLevel extends Model
{

    protected $table = 'proficiency_levels';


    use HasFactory;

    protected $fillable = [
        'name',
    ];
}