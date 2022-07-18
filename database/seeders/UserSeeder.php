<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hans',
            'email' => 'hansandika70@gmail.com',
            'password' => bcrypt('hansgeovani2'),
            'dob' => Carbon::now(),
        ]);
    }
}
