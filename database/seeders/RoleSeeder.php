<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = json_encode([
            [
                'name' => 'Admin',
                'guard_name' => 'web',
                'permissions' => [
                    'view_user',
                    'view_any_user',
                    'create_user',
                    'edit_user',
                    'delete_user',
                    'view_role',
                    'view_any_role',
                    'create_role',
                    'edit_role',
                    'delete_role',
                    'view_category',
                    'view_any_category',
                    'create_category',
                    'edit_category',
                    'delete_category',
                    'view_book',
                    'view_any_book',
                    'create_book',
                    'edit_book',
                    'delete_book',
                    'view_chapter',
                    'view_any_chapter',
                    'create_chapter',
                    'edit_chapter',
                    'delete_chapter',
                    'view_page',
                    'view_any_page',
                    'create_page',
                    'edit_page',
                    'delete_page',
                ]
            ],
            [
                'name' => 'Editor',
                'guard_name' => 'web',
                'permissions' => [
                    'view_book',
                    'view_any_book',
                    'create_book',
                    'edit_book',
                    'delete_book',
                    'view_chapter',
                    'view_any_chapter',
                    'create_chapter',
                    'edit_chapter',
                    'delete_chapter',
                    'view_page',
                    'view_any_page',
                    'create_page',
                    'edit_page',
                    'delete_page',
                ]
            ],
            [
                'name' => 'User',
                'guard_name' => 'web',
                'permissions' => [
                    'view_book',
                    'view_any_book',
                ]
            ]
        ]);

        $directPermissions = json_encode([
            ['name' => 'view_user', 'guard_name' => 'web'],
            ['name' => 'view_any_user', 'guard_name' => 'web'],
            ['name' => 'create_user', 'guard_name' => 'web'],
            ['name' => 'edit_user', 'guard_name' => 'web'],
            ['name' => 'delete_user', 'guard_name' => 'web'],
            ['name' => 'view_role', 'guard_name' => 'web'],
            ['name' => 'view_any_role', 'guard_name' => 'web'],
            ['name' => 'create_role', 'guard_name' => 'web'],
            ['name' => 'edit_role', 'guard_name' => 'web'],
            ['name' => 'delete_role', 'guard_name' => 'web'],
            ['name' => 'view_category', 'guard_name' => 'web'],
            ['name' => 'view_any_category', 'guard_name' => 'web'],
            ['name' => 'create_category', 'guard_name' => 'web'],
            ['name' => 'edit_category', 'guard_name' => 'web'],
            ['name' => 'delete_category', 'guard_name' => 'web'],
            ['name' => 'view_book', 'guard_name' => 'web'],
            ['name' => 'view_any_book', 'guard_name' => 'web'],
            ['name' => 'create_book', 'guard_name' => 'web'],
            ['name' => 'edit_book', 'guard_name' => 'web'],
            ['name' => 'delete_book', 'guard_name' => 'web'],
            ['name' => 'view_chapter', 'guard_name' => 'web'],
            ['name' => 'view_any_chapter', 'guard_name' => 'web'],
            ['name' => 'create_chapter', 'guard_name' => 'web'],
            ['name' => 'edit_chapter', 'guard_name' => 'web'],
            ['name' => 'delete_chapter', 'guard_name' => 'web'],
            ['name' => 'view_page', 'guard_name' => 'web'],
            ['name' => 'view_any_page', 'guard_name' => 'web'],
            ['name' => 'create_page', 'guard_name' => 'web'],
            ['name' => 'edit_page', 'guard_name' => 'web'],
            ['name' => 'delete_page', 'guard_name' => 'web'],
        ]);

        static::makeRolesWithPermissions($rolesWithPermissions);

        static::makeDirectPermissions($directPermissions);

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'role' => 'Admin',
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => 'editor',
                'role' => 'Editor',
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => 'user1',
                'role' => 'User',
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => 'user2',
                'role' => 'User',
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => 'user3',
                'role' => 'User',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ])->assignRole($user['role']);
        }

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = Role::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissions = collect($rolePlusPermission['permissions'])
                        ->map(fn($permission) => Permission::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissions);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission['name'],
                    'guard_name' => $permission['guard_name'],
                ]);
            }
        }
    }
}
