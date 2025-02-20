<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'company_profile';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'about',
        'user_id',
        'llc',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
