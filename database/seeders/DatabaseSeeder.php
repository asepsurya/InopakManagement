<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Asep Surya Somantri',
            'email' => 'asepsurya1998@gmail.com',
            'password' => \Hash::make('newinopak'),
            'level'=>'1'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'INOPAK',
            'email' => 'admin.inopak@gmail.com',
            'password' => \Hash::make('newinopak'),
            'level'=>'1'
        ]);
    }
}
