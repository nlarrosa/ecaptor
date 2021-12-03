<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrUsers = [
            [
                'name' => 'Nicolas',
                'last_name' => 'Larrosa',
                'email' => 'nicolaslarrosa.mail@gmail.com',
                'password' => Hash::make('Nicolas10'),
                'profile_id' => 1,
                'status_id'  => 1,
                'rol_id' => 1,
            ],
        ];

        foreach($arrUsers as $user)
        {
            User::create([
                'name'      => $user['name'],
                'last_name' => $user['last_name'],
                'email'     => $user['email'],
                'email_verified_at' => now(),
                'password'  => $user['password'],
                'remember_token' => Str::random(10),
                'profile_id' => $user['profile_id'],
                'status_id'  => $user['status_id'],
                'rol_id'     => $user['rol_id'],
            ]);
        }

        User::factory(99)->create();
    }
}
