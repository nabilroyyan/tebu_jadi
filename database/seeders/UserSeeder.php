<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user.list',
            'user.show',
            'user.create',
            'user.edit',
            'user.delete',
            'kebun.list',
            'kebun.show',
            'kebun.create',
            'kebun.edit',
            'kebun.delete',
            'timbangan.list',
            'timbangan.show',
            'timbangan.create',
            'timbangan.edit',
            'timbangan.delete',
            'hutang.list',
            'hutang.show',
            'hutang.create',
            'hutang.edit',
            'hutang.delete',
            'transaksi.list',
            'transaksi.show',
            'transaksi.create',
            'transaksi.edit',
            'transaksi.delete',
            'role.management'
        ];

         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();
         foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
         }

         $superAdmin = Role::create([
            'name' => 'Super Admin'
         ]);

         $user = Role::create([
            'name' => 'User'
         ]);

         $superAdmin->givePermissionTo([
            'user.list',
            'user.show',
            'user.create',
            'user.edit',
            'user.delete',
            'kebun.list',
            'kebun.show',
            'kebun.create',
            'kebun.edit',
            'kebun.delete',
            'timbangan.list',
            'timbangan.show',
            'timbangan.create',
            'timbangan.edit',
            'timbangan.delete',
            'hutang.list',
            'hutang.show',
            'hutang.create',
            'hutang.edit',
            'hutang.delete',
            'transaksi.list',
            'transaksi.show',
            'transaksi.create',
            'transaksi.edit',
            'transaksi.delete',
            'role.management'
         ]);

         $user->givePermissionTo([
            'user.list',
            'user.show',
            'user.create',
            'user.edit',
            'kebun.list',
            'kebun.show',
            'kebun.create',
            'timbangan.list',
            'timbangan.show',
            'timbangan.create',
            'hutang.list',
            'hutang.show',
            'transaksi.list',
            'transaksi.show',
            'kebun.edit',
         ]);

         $adminSuper = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password')
         ]);
         $adminSuper->assignRole('Super Admin');

         $userCommon = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
         ]);
         $userCommon->assignRole('User');
    }
}
