<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_offers';


    protected $fillable = [
        'description',
        // 'server_position',
        // 'responsibilities',
        'job_type_id',
        'city_id',
        'job_level_id',
        'job_title_id',
        'education_level_id',
        'language_id',
        'proficiency_level_id',
        'rate',
        'offered_salary',
        'years_of_experience',
        'expiration_date',
        'zip_code',
        'company_id',
    ];

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function jobLevel()
    {
        return $this->belongsTo(JobLevel::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function proficiencyLevel()
    {
        return $this->belongsTo(ProficiencyLevel::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_offer_skill');
    }

    public function keyResponsabilities()
    {
        return $this->hasMany(KeyResponsability::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(CompanyProfile::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'job_offer_user');
}
}