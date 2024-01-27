<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
use App\Mail\VaccinationMail;
use App\Models\Center;
use App\Models\Schedule;
use App\Models\User;
use App\Services\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class HomeController extends Controller
{

    protected $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }
    public function home()
    {
        $centers = $this->registrationService->home();
        return view('frontend.home', $centers);
    }

    public function register(RegistrationFormRequest $request)
    {
        $request->validated();
        $this->registrationService->register($request);

        return redirect()->back();
    }


   
}
