<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::insert([
            'name' => "Shah Alam Roven",
            'email' => "saroven@yahoo.com",
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);
    }
}
