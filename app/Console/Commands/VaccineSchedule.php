<?php

namespace App\Console\Commands;

use App\Models\Center;
use App\Models\Schedule;
use Illuminate\Console\Command;
use Carbon\Carbon;

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
        $this->info('Scheduling vaccination...');
        $centers = Center::all();

        foreach ($centers as $center) {
            $limit = $center->dailyLimit;

            $users = Schedule::where('status', 'Not vaccinated')
                ->where('center_id', $center->id)
                ->orderBy('created_at')
                ->limit($limit)
                ->get();
            foreach ($users as $user) {
                $user->status = Schedule::SCHEDULED;
                $user->scheduled_at = Carbon::now()->addDays(1)->hour(21)->minute(0)->second(0)->format('Y-m-d H:i:s');
                $user->save();
            }
        }
        $this->info('Vaccination scheduling completed.');
    }
}
