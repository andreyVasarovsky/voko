<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        //Reset cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create permissions
        $permissions = [

        ];
    }
}
