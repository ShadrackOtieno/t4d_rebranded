<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Staff;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([

        	'email' => 'administrator@ires.net',
        	'password' => Hash::make('secret'),
        	'role' => 'administrator',
        	'email_verified_at' => now(),
        ]);

        Staff::create([

        	'first_name' => 'Admin',
        	'last_name' => 'Ires',
            'phone' => '0710010001',
        	'user_id' => $user->id,
        ]);
    }
}
