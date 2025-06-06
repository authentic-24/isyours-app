<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{

    protected $table = 'languages';


    use HasFactory;

    protected $fillable = [
        'name',
    ];
}