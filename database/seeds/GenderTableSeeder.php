<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::Insert([
        	'title' => 'Male'
        ]);

        Gender::Insert([
        	'title' => 'Female'
        ]);
        
        Gender::Insert([
        	'title' => 'Other'
        ]);
    }
}
