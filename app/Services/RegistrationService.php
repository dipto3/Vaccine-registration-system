<?php

namespace App\Services;

use App\Models\Center;
use App\Models\Schedule;
use App\Models\User;

class RegistrationService
{

    public function home()
    {
        $centers = Center::all();
        return compact($centers);
    }

    public function register($request)
    {
        $user = User::create([
            'nid' => $request->nid,
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
        ]);

        Schedule::create([
            'user_id' => $user->id,
            'center_id' => $request->center,
            'status' => Schedule::NOT_VACCINATED,
        ]);
    }
}
