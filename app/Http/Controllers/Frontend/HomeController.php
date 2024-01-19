<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\VaccinationMail;
use App\Models\Center;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $centers = Center::all();
        return view('frontend.home', compact('centers'));
    }

    public function register(Request $request)
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

        return redirect()->back();
    }

   
}
