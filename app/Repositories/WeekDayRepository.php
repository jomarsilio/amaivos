<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\WeekDay;

class WeekDayRepository extends Repository
{
    public function __construct(WeekDay $model)
    {
        $this->model = $model;
    }

    /**
     * Returns all active week days.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function allActive()
    {
        return $this->model
            ->active()
            ->get();
    }
}
