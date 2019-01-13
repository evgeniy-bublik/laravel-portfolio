<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => env('DEFAULT_ADMIN_EMAIL', 'admin@admin.com'),
            'password' => bcrypt(env('DEFAULT_ADMIN_PASSWORD', 'password')),
        ]);
    }
}
