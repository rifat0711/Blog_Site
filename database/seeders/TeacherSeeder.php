<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Teacher::Factory()->count(20)->create();




        // DB::table('teachers')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $data = [
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10). '@gmail.com', // Shorter email addresses
        //         'address' => Str::random(30),
        //     ],
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10). '@gmail.com', // Shorter email addresses
        //         'address' => Str::random(30),
        //     ],
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10). '@gmail.com', // Shorter email addresses
        //         'address' => Str::random(30),
        //     ],
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10). '@gmail.com', // Shorter email addresses
        //         'address' => Str::random(30),
        //     ],
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10). '@gmail.com', // Shorter email addresses
        //         'address' => Str::random(30),
        //     ],
        //     // Add more entries as needed
        // ];
        
        // DB::table('teachers')->insert($data);


    }
}
