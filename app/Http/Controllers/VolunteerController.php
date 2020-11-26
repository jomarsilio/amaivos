<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExpertiseAreaRepository;

class VolunteerController extends Controller
{
    public function __construct(
        ExpertiseAreaRepository $expertiseAreaRepository
    ) {
        $this->expertiseAreaRepository = $expertiseAreaRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Resgata os valores para popular o formulário.
        $weekDays = [];
        $weekHours = [];
        $cities = [];
        $expertiseAreas = $this->expertiseAreaRepository->allActive();

        return view(
            'website.volunteer.create',
            compact('weekDays', 'weekHours', 'cities', 'expertiseAreas')
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
