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
        ];

        foreach ($permissions AS $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        //Allow everything
        Role::create(['name' => 'Super Admin']);


        //Reader permissions
        $role = Role::create(['name' => 'Reader']);
        $readerPermissions = [
            'article_show',
            'article_access',
        ];
        foreach ($readerPermissions AS $permission){
            $role->givePermissionTo($permission);
        }
        //Writer permissions
        $role = Role::create(['name' => 'Writer']);
        $writerPermissions = [
            'article_create',
            'article_show',
            'article_access',
        ];
        foreach ($writerPermissions AS $permission){
            $role->givePermissionTo($permission);
        }
        //Editor permissions
        $role = Role::create(['name' => 'Editor']);
        $editorPermissions = [
            'article_edit',
            'article_show',
            'article_access',
        ];
        foreach ($editorPermissions AS $permission){
            $role->givePermissionTo($permission);
        }
    }
}
