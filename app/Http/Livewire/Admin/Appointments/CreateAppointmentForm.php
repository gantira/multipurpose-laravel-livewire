<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointment;
use App\Models\Client;

class CreateAppointmentForm extends AdminComponent
{
    public $state = [];

    public function createAppointment()
    {
        // validate
        $this->state['status'] = 'open';

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
