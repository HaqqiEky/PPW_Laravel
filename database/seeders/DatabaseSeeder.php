<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Item;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        //$this->call([
           // ItemSeeder::class,
    //    ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'phone' => '0584016259',
            'email' => 'admin@example.com',
            'role' => 'administrator',
            'password' => Hash::make('password'),
        ]);
    }
}
