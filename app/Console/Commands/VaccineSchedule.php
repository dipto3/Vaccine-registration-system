<?php

namespace App\Console\Commands;

use App\Models\Center;
use App\Models\Schedule;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\VaccinationMail;

class VaccineSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:vaccine-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $centers = Center::all();

        foreach ($centers as $center) {
            $limit = $center->dailyLimit;

            $users = Schedule::where('status', 'Not vaccinated')
                ->where('center_id', $center->id)
                ->orderBy('created_at')
                ->limit($limit)
                ->get();
            foreach ($users as $user) {
                if (!in_array(now()->dayOfWeek, [5, 6])) {
                $user->status = Schedule::SCHEDULED;
                $user->scheduled_at = Carbon::now()->addDays(1)->hour(10)->minute(0)->second(0)->format('Y-m-d H:i:s');
                Mail::to($user->userInfo->email)->send(new VaccinationMail($user));
                $user->save();
                }
            }
        }
    }
}
