<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10000;$i++){
            DB::table('members')->insert([
                'email' => Str::random(10).'@example.com',
            ]);
            DB::table('results')->insert([
                'member_id' => Members::all()->random()->id,
                'milliseconds' => rand(1, 999)
            ]);
        }
    }
}
