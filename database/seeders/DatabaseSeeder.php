<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Food;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            User::create(['name'=>'admin
            ','password'=>bcrypt('12345678'),'email'=>'admin1234@gmail.com']);
        
        }
    }
}
