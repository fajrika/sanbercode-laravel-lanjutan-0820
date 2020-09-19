<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    public function run()
    {
        User::create([
            // 'id'  => DB::raw("select UUID()"),
            'name' => "AdminResto",
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
            'role_uuid' => Role::where('name','Admin')->first()->uuid,
        ]);
        User::create([
            // 'id'  => DB::raw("select UUID()"),
            'name' => "Pelanggan Setia",
            'email' => "user@gmail.com",
            'password' => Hash::make('user'),
            'role_uuid' => Role::where('name','User')->first()->uuid,
        ]);
    }
}
