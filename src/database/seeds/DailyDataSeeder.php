<?php

use App\Models\DailyData;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class DailyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $period = CarbonPeriod::create('2021-05-01', Carbon::now());

        foreach ($period as $date) {
            factory(DailyData::class, 1)->create([
                'date' => $date,
            ]);
        }
    }
}
