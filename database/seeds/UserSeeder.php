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
        //
        $old = \App\User::where('email', 'admin@admin.com');
        if ($old)
            $old->delete();
        $admin = \App\User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456789'),
                'role' => 'admin',
                'phone' => '123456',
                
            ]
        );

    }
}
