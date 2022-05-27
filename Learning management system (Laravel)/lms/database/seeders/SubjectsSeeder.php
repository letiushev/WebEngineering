<?php

namespace Database\Seeders;

use App\Http\Controllers\SubjectController;
use App\Models\Solution;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        DB::table('subjects')->truncate();
        Subjects::factory()
        ->count(5)
        ->hasTasks(3)
        ->for($users->random())
        ->create();
    }
}
