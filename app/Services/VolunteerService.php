<?php

namespace App\Services;

use App\Services\Service;
use App\Repositories\VolunteerRepository;
use App\Repositories\VolunteerWeekDayRepository;
use DB;

class VolunteerService extends Service
{
    public function __construct(
        VolunteerRepository $volunteerRepository,
        VolunteerWeekDayRepository $volunteerWeekDayRepository
    ) {
        $this->volunteerRepository = $volunteerRepository;
        $this->volunteerWeekDayRepository = $volunteerWeekDayRepository;
    }

    /**
     * Save volunteer
     *
     * @param App\Http\Requests\VolunteerRequest $request
     * @return Object
     */
    public function save($request)
    {
        $volunteer = DB::transaction(function () use ($request) {
            // @todo - logar dados novos e antigos.
            // $oldVolunteer = $this->volunteerRepository->findFirstBy('cpf', $requestVolunteer['cpf']);

            $volunteer = $this->volunteerRepository->updateOrCreate(
                [
                    'cpf' => $request->input('volunteer.cpf')
                ],
                [
                    'city_id' => $request->input('volunteer.city_id'),
                    'expertise_area_id' => $request->input('volunteer.expertise_area_id'),
                    'name' => $request->input('volunteer.name'),
                    'birth_date' => $request->input('volunteer.birth_date'),
                    'cell_phone' => $request->input('volunteer.cell_phone'),
                    'email' => $request->input('volunteer.email'),
                    'responsible_name' => $request->input('volunteer.responsible_name'),
                    'responsible_cpf' => $request->input('volunteer.responsible_cpf'),
                    'occupation' => $request->input('volunteer.occupation'),
                    'available_time' => $request->input('volunteer.available_time'),
                    'ip' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                ]
            );

            $this->volunteerWeekDayRepository->deleteBy('volunteer_id', $volunteer->id);

            foreach ($request->input('volunteer_week_day') as $weekDayId) {
                $this->volunteerWeekDayRepository->create([
                    'volunteer_id' => $volunteer->id,
                    'week_day_id' => $weekDayId,
                ]);
            }

            // @todo - enviar e-mail

            return $volunteer;
        }, 5);

        return $this->response([
            'volunteer' => $volunteer
        ]);
    }
}
