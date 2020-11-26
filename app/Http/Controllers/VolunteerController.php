<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolunteerController extends Controller
{
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
        $areas = [];

        return view(
            'website.volunteer.create',
            compact('weekDays', 'weekHours', 'cities', 'areas')
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
