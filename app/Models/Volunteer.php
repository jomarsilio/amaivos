<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Volunteer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'expertise_area_id',
        'name',
        'birth_date',
        'cpf',
        'cell_phone',
        'email',
        'responsible_name',
        'responsible_cpf',
        'occupation',
        'available_time',
        'ip',
        'user_agent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'birth_date' => 'datetime:Y-m-d',
    // ];

    /**
     * Volunteer week days.
     */
    public function volunteerWeekDays()
    {
        return $this->hasMany('App\Models\VolunteerWeekDay', 'volunteer_id', 'id');
    }
  
    /**
     * City.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
   
    /**
     * Expertise area.
     */
    public function expertiseArea()
    {
        return $this->belongsTo('App\Models\ExpertiseArea', 'expertise_area_id', 'id');
    }

    /**
     * Set the volunteer's birth date.
     *
     * @param  string  $birthDate
     * @return void
     */
    public function setBirthDateAttribute($birthDate)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y', $birthDate)->format('Y-m-d');
    }
}
