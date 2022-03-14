<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create permissions
        $permissions = [
            'article_create',
            'article_edit',
            'article_show',
            'article_delete',
            'article_access',
            'category_create',
            'category_edit',
            'category_show',
            'category_delete',
            'category_access',
            'tag_create',
            'tag_edit',
            'tag_show',
            'tag_delete',
            'tag_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
        ];

        foreach ($permissions AS $permission){
            Permission::firstOrCreate(['name' => $permission]);
        }

        //Allow everything
        Role::firstOrCreate(['name' => 'Super Admin']);


        //Reader permissions
        $role = Role::firstOrCreate(['name' => 'Reader']);
        $readerPermissions = [
            'article_show',
            'article_access',
        ];
        $role->syncPermissions($readerPermissions);
//        foreach ($readerPermissions AS $permission){
//            $role->givePermissionTo($permission);
//        }
        //Writer permissions
        $role = Role::firstOrCreate(['name' => 'Writer']);
        $writerPermissions = [
            'article_create',
            'article_show',
            'article_access',
        ];
        $role->syncPermissions($readerPermissions);
//        foreach ($writerPermissions AS $permission){
//            $role->givePermissionTo($permission);
//        }
        //Editor permissions
        $role = Role::firstOrCreate(['name' => 'Editor']);
        $editorPermissions = [
            'article_edit',
            'article_show',
            'article_access',
        ];
        $role->syncPermissions($editorPermissions);
//        foreach ($editorPermissions AS $permission){
//            $role->givePermissionTo($permission);
//        }
    }
}
