<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'الأولى'
        ]);
        Group::create([
            'name' => 'الثانية'
        ]);
        Group::create([
            'name' => 'الثالثة'
        ]);
        Group::create([
            'name' => 'الرابعة'
        ]);
        Group::create([
            'name' => 'الخامسة'
        ]);
        Group::create([
            'name' => 'السادسة'
        ]);
    }
}
