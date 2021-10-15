<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
            'name' => 'السبت'
        ]);
        Day::create([
            'name' => 'الأحد'
        ]);
        Day::create([
            'name' => 'الإثنين'
        ]);
        Day::create([
            'name' => 'الثلاثاء'
        ]);
        Day::create([
            'name' => 'الأربعاء'
        ]);
        Day::create([
            'name' => 'الخميس'
        ]);
        Day::create([
            'name' => 'الجمعة'
        ]);
    }
}
