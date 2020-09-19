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
            // 'id'  => DB::raw("select UUID()"),
            'name' => "Admin",
        ]); 
        Role::create([
            // 'id'  => DB::raw("select UUID()"),
            'name' => "User",
        ]);
    }
}
