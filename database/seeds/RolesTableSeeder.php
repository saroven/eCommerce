<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::Insert([
        	'title' => 'Administrator'
        ]);

        Role::Insert([
        	'title' => 'Management'
        ]);
        
        Role::Insert([
        	'title' => 'User'
        ]);
    }
}
