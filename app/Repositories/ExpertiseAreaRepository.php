<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\ExpertiseArea;

class ExpertiseAreaRepository extends Repository
{
    public function __construct(ExpertiseArea $model)
    {
        $this->model = $model;
    }

    /**
     * Returns all active expertise areas.
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
