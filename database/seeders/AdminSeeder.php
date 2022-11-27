<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = User::where('email', 'admin@laravel.com')->first();
        if (is_null($check)) {
            $admin = Role::whereName('Admin')->first();

            $user = new User;
            $user->name = 'Admin';
            $user->email = 'admin@laravel.com';
            $user->password = bcrypt('semangataini');
            $user->save();

            $user->roles()->attach($admin->id);
        }
    }
}
