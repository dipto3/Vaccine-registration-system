<?php

namespace App\Services;
use App\Models\Center;
use App\Models\Schedule;
use App\Models\User;

class WebhookService
{
    public function zapier($request)
    {
        $data = $request->all();
        $centerName = $data['center_id'];
        $vaccineCenter = Center::where('name', $centerName)->first();
        $vaccineCenterId = $vaccineCenter->id;

        $name = $data['name'];
        $phoneNumber = $data['phone'];
        $nid = $data['nid'];
        $email = $data['email'];

        $registration = User::create([

            'name' => $name,
            'phone' => $phoneNumber,
            'nid' => $nid,
            'email' => $email,
        ]);
        Schedule::create([
            'user_id' => $registration->id,
            'center_id' => $vaccineCenterId,
            'status' => Schedule::NOT_VACCINATED,
        ]);
    }
}
