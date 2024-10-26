<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create = [
            'name' => 'Admin',
            'email' => 'admin@nagarpalika.com',
            'password' => Hash::make('Admin@nagarpalika4321'),
        ];

        admin::create($create);
    }
}
