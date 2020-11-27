<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\City;

class CityRepository extends Repository
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * Returns all active cities.
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
