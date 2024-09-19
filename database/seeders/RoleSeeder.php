<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tạo seeder với 3 bản ghi
        Role::create([
                'role_code' => "RO-".Str::random(5),
                'name' => "Admin"
        ]);
        Role::create([
            'role_code' => "RO-".Str::random(5),
            'name' => "Staff"
        ]);
        Role::create([
            'role_code' => "RO-".Str::random(5),
            'name' => "User"
        ]);
    }
}