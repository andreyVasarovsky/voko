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
        $readerRole = Role::firstOrCreate(['name' => 'Reader']);
        $readerRole->syncPermissions([
            'article_show',
            'article_access',
        ]);
        //Writer permissions
        $writerRole = Role::firstOrCreate(['name' => 'Writer']);
        $writerRole->syncPermissions([
            'article_create',
            'article_show',
            'article_access',
        ]);
        //Editor permissions
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);
        $editorRole->syncPermissions([
            'article_edit',
            'article_show',
            'article_access',
        ]);
    }
}
