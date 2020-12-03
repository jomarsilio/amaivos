<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\Volunteer;

class VolunteerRepository extends Repository
{
    public function __construct(Volunteer $model)
    {
        $this->model = $model;
    }
}
