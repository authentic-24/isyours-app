<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Visa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visa';

    protected $fillable = [
        'code',
        'name',
    ];

}
