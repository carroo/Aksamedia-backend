<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'phone' => '0895397073311',
            'email' => 'admin',
        ]);
        Division::create(['name' => 'Mobile Apps']);
        Division::create(['name' => 'QA']);
        Division::create(['name' => 'Full Stack']);
        Division::create(['name' => 'BackEnd']);
        Division::create(['name' => 'FrontEnd']);
        Division::create(['name' => 'UI/UX Designer']);
        Employee::create([
            'name' => 'Alice Johnson',
            'image' => 'images/alice.jpg',
            'phone' => '1234567890',
            'division_id' => 1, 
            'position' => 'Sfaff',
        ]);
        
        Employee::create([
            'name' => 'Bob Smith',
            'image' => 'images/bob.jpg',
            'phone' => '0987654321',
            'division_id' => 2, 
            'position' => 'staff',
        ]);
        
        Employee::create([
            'name' => 'Charlie Brown',
            'image' => 'images/charlie.jpg',
            'phone' => '1112223333',
            'division_id' => 3, 
            'position' => 'programmer',
        ]);
        
        Employee::create([
            'name' => 'Diana Prince',
            'image' => 'images/diana.jpg',
            'phone' => '4445556666',
            'division_id' => 4,
            'position' => 'manager',
        ]);
        
        Employee::create([
            'name' => 'Eve Adams',
            'image' => 'images/eve.jpg',
            'phone' => '7778889999',
            'division_id' => 5, 
            'position' => 'manager',
        ]);
    }
}
