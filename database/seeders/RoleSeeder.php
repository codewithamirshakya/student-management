<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $this->getModels();
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);

        $permissionTypes = [
            'list',
            'create',
            'update',
            'delete'
        ];

        $models = $this->getModels();
        $permissions = [];
        foreach ($models as $model) {
            foreach ($permissionTypes as $permissionType) {
                $permissions[] = $model.'.'.$permissionType;
            }
        }

        $permissionList = [];
        foreach ($permissions as $permission) {
            $permissionList[] = Permission::create(['name' => $permission]);
        }

        $admin->syncPermissions($permissionList);
        $teacher->syncPermissions($permissionList);

    }

    protected function getModels(): array
    {
        $models = [];
        $files = File::allFiles(app_path('Models'));

        foreach ($files as $file) {
            $models[] = str_replace('.php','',$file->getRelativePathname());
        }

        return $models;
    }
}
