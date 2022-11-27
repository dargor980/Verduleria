<?php

use Illuminate\Database\Seeder;
use App\User;
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
        if((new User)->where('id', 1)->doesntExist()){
            User::create([
                'id' => 1,
                'name' => 'Verduleria',
                'email' => 'websantagemita@gmail.com',
                'password' => Hash::make('Admin123')
            ]);
        }
    }
}
