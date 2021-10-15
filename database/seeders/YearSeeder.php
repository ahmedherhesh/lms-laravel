<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create([
            'name' => 'أولى إعدادى'
        ]);
        Year::create([
            'name' => 'تانية إعدادى'
        ]);
        Year::create([
            'name' => 'ثالثة إعدادى'
        ]);
        Year::create([
            'name' => 'أولى ثانوى'
        ]);
        Year::create([
            'name' => 'تانية ثانوي'
        ]);
        Year::create([
            'name' => 'تالتة ثانوي'
        ]);
    }
}
