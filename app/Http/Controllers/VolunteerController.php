<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest as Request;
use App\Repositories\ExpertiseAreaRepository;
use App\Repositories\WeekDayRepository;
use App\Repositories\CityRepository;
use App\Services\VolunteerService;

class VolunteerController extends Controller
{
    public function __construct(
        ExpertiseAreaRepository $expertiseAreaRepository,
        WeekDayRepository $weekDayRepository,
        CityRepository $cityRepository,
        VolunteerService $volunteerService
    ) {
        $this->expertiseAreaRepository = $expertiseAreaRepository;
        $this->weekDayRepository = $weekDayRepository;
        $this->cityRepository = $cityRepository;
        $this->volunteerService = $volunteerService;
    }

    /**
     * Show the form for creating a new volunteer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $availableTimes = collect([
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4
        ]);
        $weekDays = $this->weekDayRepository->allActive();
        $cities = $this->cityRepository->allActive();
        $expertiseAreas = $this->expertiseAreaRepository->allActive();

        return view(
            'website.volunteer.create',
            compact('availableTimes', 'weekDays', 'cities', 'expertiseAreas')
        );
    }

    /**
     * Store a newly created volunteer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->volunteerService->save($request);

        if (!empty($response->volunteer)) {
            return redirect()
                ->route('volunteer.create')
                ->with('volunteer_created', 'Dados salvos com sucesso!');
        }
    }
}
