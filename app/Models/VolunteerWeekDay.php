<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerWeekDay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'volunteer_id',
        'week_day_id',
    ];

    /**
     * Volunteer.
     */
    public function volunteer()
    {
        return $this->belongsTo('App\Models\Volunteer', 'volunteer_id', 'id');
    }
  
    /**
     * Week day.
     */
    public function weekDay()
    {
        return $this->belongsTo('App\Models\WeekDay', 'week_day_id', 'id');
    }
}
