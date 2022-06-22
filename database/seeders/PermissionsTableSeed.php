<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class PermissionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //Roles
                $role1 = Role::create(['name' => 'administrador']);
                $role2 = Role::create(['name' => 'auxiliar']);

        
                //Permisos
                Permission::create(['name' => 'administrar_usuario'])->syncRoles([$role1]);
                Permission::create(['name' => 'eliminar_producto'])->syncRoles([$role1]);
                Permission::create(['name' => 'editar_proveedor'])->syncRoles([$role1]);
                Permission::create(['name' => 'crear_proveedor'])->syncRoles([$role1]);

    }
}
