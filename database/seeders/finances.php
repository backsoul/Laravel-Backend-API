<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Create fake data
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class finances extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('finances')->insert([
            'entry' => rand(10000, 2000),
            'spending' => rand(10000, 2000),
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s')
        ]);
    }
}
