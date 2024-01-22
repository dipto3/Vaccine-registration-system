<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
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

    public function register(RegistrationFormRequest $request)
    {
        $request->validated();
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


    public function zapier(Request $request)
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

        return response()->json(['message' => 'Registration successful!']); 
        
    }

}
