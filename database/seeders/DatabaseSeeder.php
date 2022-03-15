<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
        ]);
//        try {
//            $users = User::factory(1)->create();
////            foreach ($users AS $user){
////                $user->create();
////            }
//        }catch (QueryException $exception){
//            dd($exception->getMessage());
//        }
        $admin = User::firstOrCreate(['name' => 'admin'], [
            'name' => 'admin',
            'email' => 'admin@voko.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('Super Admin');

        $reader = User::firstOrCreate(['name' => 'Reader'], [
            'name' => 'Reader',
            'email' => 'Reader@Reader.Reader',
            'email_verified_at' => now(),
            'password' => Hash::make('Reader'),
            'remember_token' => Str::random(10),
        ]);
        $reader->assignRole('Reader');

        $writer = User::firstOrCreate(['name' => 'Writer'], [
            'name' => 'Writer',
            'email' => 'Writer@Writer.Writer',
            'email_verified_at' => now(),
            'password' => Hash::make('Writer'),
            'remember_token' => Str::random(10),
        ]);
        $writer->assignRole('Writer');

        $editor = User::firstOrCreate(['name' => 'Editor'], [
            'name' => 'Editor',
            'email' => 'Editor@Editor.Editor',
            'email_verified_at' => now(),
            'password' => Hash::make('Editor'),
            'remember_token' => Str::random(10),
        ]);
        $editor->assignRole('Editor');
    }
}
