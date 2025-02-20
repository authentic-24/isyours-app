<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyResponsability extends Model
{
    use HasFactory;

    protected $table = 'key_responsabilities';

    protected $fillable = [
        'responsability',
        'job_offer_id',
    ];


    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }

}
