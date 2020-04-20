<?php

use App\Season;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentYear = new Carbon('2010-01-01');
        while($currentYear->year < 2021) {
            Season::create([
                'title' => $currentYear->year . ' metų sezonas',
                'start_date' => $currentYear->year . '-01-01',
                'end_date' => $currentYear->year . '-12-31'
            ]);
            $currentYear = $currentYear->addYear(1);
        }
    }
}
