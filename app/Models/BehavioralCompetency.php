<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BehavioralCompetency extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'category',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get localized name
     */
    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' && $this->name_en ? $this->name_en : $this->name;
    }

    /**
     * Get localized description
     */
    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' && $this->description_en ? $this->description_en : $this->description;
    }

    /**
     * Los usuarios que tienen esta competencia
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_behavioral_competency')
            ->withPivot('level')
            ->withTimestamps();
    }
}
