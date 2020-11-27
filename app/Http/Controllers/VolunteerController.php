<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExpertiseAreaRepository;
use App\Repositories\WeekDayRepository;
use App\Repositories\CityRepository;

class VolunteerController extends Controller
{
    public function __construct(
        ExpertiseAreaRepository $expertiseAreaRepository,
        WeekDayRepository $weekDayRepository,
        CityRepository $cityRepository
    ) {
        $this->expertiseAreaRepository = $expertiseAreaRepository;
        $this->weekDayRepository = $weekDayRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Resgata os valores para popular o formulário.
        $availableTimes = collect([1,2,3,4]);
        $weekDays = $this->weekDayRepository->allActive();
        $cities = $this->cityRepository->allActive();
        $expertiseAreas = $this->expertiseAreaRepository->allActive();

        return view(
            'website.volunteer.create',
            compact('weekDays', 'availableTimes', 'cities', 'expertiseAreas')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
