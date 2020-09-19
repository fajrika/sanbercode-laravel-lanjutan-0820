<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => "Admin",
        ]); 
        Role::create([
            'name' => "User",
        ]);
    }
}
