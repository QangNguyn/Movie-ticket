<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $groupsId = DB::table('groups')->insertGetId(
            ['name' => 'Super Admin', 'user_id' => 0]
        );
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        if ($groupsId) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'group_id' => $groupsId
            ]);
        }


        DB::table('modules')->insert(
            [
                [
                    'name' => 'user',
                    'title' => 'User management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'group',
                    'title' => 'Group management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit', 'permissions' => 'Permissions']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'cinema',
                    'title' => 'Cinema management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'room',
                    'title' => 'Room management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'movie',
                    'title' => 'Movie management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'category',
                    'title' => 'Category management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'director',
                    'title' => 'Director management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'performer',
                    'title' => 'Performer management',
                    'role' => json_encode(['view' => 'View', 'add' => 'Add', 'delete' => 'Delete', 'edit' => 'Edit']),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
