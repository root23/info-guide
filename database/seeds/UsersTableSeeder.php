<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Адмэн',
            'email' => 'admin@agw.ru',
            'password' => bcrypt('q123456'),
        ]);

        $author = User::create([
           'name' => 'Авторитет',
           'email' => 'author@agw.ru',
           'password' => bcrypt('123456'),
        ]);

        $user = User::create([
            'name' => 'Очередняра',
            'email' => 'user@agw.ru',
            'password' => bcrypt('user2352'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
