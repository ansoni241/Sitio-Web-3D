<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create([
            'name' => 'admin',
        ]);
        $role2 = Role::create([
            'name' => 'supervisor',
        ]);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.product.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.product.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.product.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.product.show'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.reportage.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportage.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportage.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportage.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportage.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reportage.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'edit_website'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.social.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.social.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.social.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.social.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.social.show'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.chart.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.chart.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.chart.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.chart.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.chart.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.chart.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.videofile.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.videofile.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.videofile.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.videofile.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.videofile.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.videofile.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.entrevista.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.entrevista.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.entrevista.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.entrevista.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.entrevista.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.entrevista.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.contactanos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactanos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactanos.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactanos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactanos.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactanos.destroy'])->syncRoles([$role1]);

    }
}
