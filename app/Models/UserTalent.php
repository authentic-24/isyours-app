<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTalent extends Model
{
    use HasFactory;

    protected $table = 'user_talents';

    protected $fillable = [
        'user_id',
        'talent',
    ];

    /**
     * Get the user that owns the talent.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
