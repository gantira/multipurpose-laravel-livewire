<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class CreateAppointmentForm extends AdminComponent
{
    public $state = [
        'status' => 'SCHEDULED',
    ];

    public function createAppointment()
    {
        Validator::make(
            $this->state,
            [
                'client_id' => 'required',
                'date' => 'required',
                'time' => 'required',
                'note' => 'nullable',
                'status' => 'required|in:SCHEDULED,CLOSED',
            ],
            [
                'client_id.required' => 'The client field is required'
            ]
        )->validate();

        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment craeted succesfully!']);
    }

    public function render()
    {
        $clients = Client::all();

        return view('livewire.admin.appointments.create-appointment-form', [
            'clients' => $clients,
        ]);
    }
}
