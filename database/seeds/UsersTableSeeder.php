<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password =  bcrypt('admin@123');

        $user->save();
    }
}
