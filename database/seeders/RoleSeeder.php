<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Secretaria']);
        $role3 = Role::create(['name' => 'Tesoreria']);
        $role4 = Role::create(['name' => 'Orientacion']);
        $role5 = Role::create(['name' => 'Consejeria']);

        //Permisos para admin 
        $permission = Permission::create(['name' => 'dashboard.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'dashboardsec.index'])->assignRole($role2);
        $permission = Permission::create(['name' => 'paneltesoreria.index'])->assignRole($role3);
        $permission = Permission::create(['name' => 'usuarios.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.edit'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.update'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.destroy'])->assignRole($role1);
        $permission = Permission::create(['name' => 'periodo'])->assignRole($role1);
        $permission = Permission::create(['name' => 'inicio.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'inicio.store'])->assignRole($role1);
        $permission = Permission::create(['name' => 'cursos.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cursos'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padre.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.edit'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.update'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.destroy'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padre.show'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.edit'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.update'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.show'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.destroy'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'retrasadas.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'profile'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.edit'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.update'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.editar'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'imagenE.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'image.store'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'horario.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'horario.create'])->assignRole($role1);
        
        //Permisos para secretaria

     

    }
}
