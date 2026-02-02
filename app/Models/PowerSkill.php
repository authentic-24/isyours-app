<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PowerSkill extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
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
     * Los usuarios que tienen esta power skill
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_power_skill')
            ->withPivot('level')
            ->withTimestamps();
    }
}
