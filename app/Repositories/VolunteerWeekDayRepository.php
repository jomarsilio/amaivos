<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\VolunteerWeekDay;

class VolunteerWeekDayRepository extends Repository
{
    public function __construct(VolunteerWeekDay $model)
    {
        $this->model = $model;
    }
}
