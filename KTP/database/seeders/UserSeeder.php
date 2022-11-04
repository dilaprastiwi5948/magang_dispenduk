<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $admin_data = [
            'username' => 'admin',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ];

        $admin_user = User::create($admin_data);

        $admin_detail = [
            'user_id' => $admin_user->id,
            'name' => $faker->name(),
            'nik' => rand(00000000000000000, 99999999999999999),
            'position' => "Admin"
        ];

        UserDetail::create($admin_detail);
    }
}
