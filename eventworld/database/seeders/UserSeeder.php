<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

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
            'access_level'  => '1',
            'firstname' => 'Giorgos',
            'lastname' => 'Kyros',
            'city' => '',
            'phone' => '',
            'email' => 'georgeky2001@gmail.com',
            'password' => bcrypt("eventworld123")
        ]);

        User::create([
            'access_level'  => '1',
            'firstname' => 'Christos',
            'lastname' => 'Laskos',
            'city' => 'Thessaloniki',
            'phone' => '+306975127876',
            'email' => 'ait122020@ait.teithe.gr',
            'password' => bcrypt("eventworld123")
        ]);

        User::create([
            'access_level'  => '1',
            'firstname' => 'Ioannis',
            'lastname' => 'Manwlas',
            'city' => '',
            'phone' => '',
            'email' => 'gmanwlas@hotmail.com',
            'password' => bcrypt("eventworld123")
        ]);
    }
}
