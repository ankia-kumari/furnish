<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("roles")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $role = new Role();

        $roleAdmin = $role->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'manage administration privileges'
        ]);

        $roleUser = $role->create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'manage normal user privileges'
        ]);
    }
}
