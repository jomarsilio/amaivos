<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class VolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'volunteer.name' => 'required|string|max:255',
            'volunteer.birth_date' => 'required|string|size:10|date_format:d/m/Y',
            'volunteer.cpf' => 'required|string|size:14',
            'volunteer.cell_phone' => 'required|string|size:15',
            'volunteer.email' => 'nullable|email',
            'volunteer.responsible_name' => 'nullable|string|max:255',
            'volunteer.responsible_cpf' => 'nullable|string|size:14',
            'volunteer.occupation' => 'required|string|max:150',
            'volunteer.city_id' => 'required|numeric',
            'volunteer.available_time' => 'required|numeric',
            'volunteer_week_day' => 'required|array',
            'volunteer.expertise_area_id' => 'required|numeric',
            'volunteer.confirmation' => 'required|numeric',
        ];

        if (request()->input('volunteer.birth_date')) {
            // Rescues the volunteer's date of birth.
            $volunteerBirthDate = Carbon::createFromFormat('d/m/Y', request()->input('volunteer.birth_date'));

            // Is under 18 years old?
            if ($volunteerBirthDate->diffInYears(now()) < 18) {
                // Responsible is required.
                $rules['volunteer.responsible_name'] = 'required|string|max:255';
                $rules['volunteer.responsible_cpf'] = 'required|string|size:14';
            }
        }

        return $rules;
    }
}
