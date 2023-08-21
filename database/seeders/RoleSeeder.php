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

        //Asignacion de permisos 
        $permission = Permission::create(['name' => 'dashboard.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'dashboardsec.index'])->assignRole($role1, $role2);
        $permission = Permission::create(['name' => 'paneltesoreria.index'])->assignRole($role3);
        
        //asignacion_de_usuario
        $permission = Permission::create(['name' => 'usuarios.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.edit'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.update'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.destroy'])->assignRole($role1);
        $permission = Permission::create(['name' => 'sendData'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.deshabilitar'])->assignRole($role1);
        $permission = Permission::create(['name' => 'usuarios.habilitar'])->assignRole($role1);
        
        //reportes_matricula
        $permission = Permission::create(['name' => 'reportes.index'])->assignRole($role1, $role2);
        $permission = Permission::create(['name' => 'repalumno.pdf'])->assignRole($role1, $role2);
        $permission = Permission::create(['name' => 'repadre.pdf'])->assignRole($role1, $role2);

        //periodo_matricula
        $permission = Permission::create(['name' => 'periodo'])->assignRole($role1);
        $permission = Permission::create(['name' => 'inicio.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'inicio.store'])->assignRole($role1);
        
        //cursos
        $permission = Permission::create(['name' => 'cursos.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cursos'])->syncRoles([$role1, $role2]);
        
        //padres
        $permission = Permission::create(['name' => 'padre.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.edit'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.update'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padres.destroy'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'padre.show'])->syncRoles([$role1, $role2]);
        
        //alumnos
        $permission = Permission::create(['name' => 'alumnos.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.edit'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.update'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.pdf'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.show'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'alumnos.destroy'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'retrasadas.index'])->syncRoles([$role1, $role2]);
        
        //perfil
        $permission = Permission::create(['name' => 'profile'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.edit'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.update'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'profile.editar'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
       
        //imagen_perfil       
        $permission = Permission::create(['name' => 'imagenE.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'image.store'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        $permission = Permission::create(['name' => 'imagenE.destroy'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);
        
        //horario
        $permission = Permission::create(['name' => 'horario.index'])->assignRole($role1, $role2);
        $permission = Permission::create(['name' => 'horario.create'])->assignRole($role1, $role2);
        
       //matriculado 
       $permission = Permission::create(['name' => 'creatematricula'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'submitmatricula'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'datospadre.create'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'submitpadre'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'datosmadre.create'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'datosencargado.create'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'submitencargado'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'parientetransporte'])->assignRole($role1, $role2);
       $permission = Permission::create(['name' => 'terminar_matricula'])->assignRole($role1, $role2);
       


     

    }
}
