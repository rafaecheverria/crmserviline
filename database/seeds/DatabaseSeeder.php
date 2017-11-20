<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Speciality;
use App\Unity;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // Desactiva la verificación de las claves foráneas, esto se hace para poder eliminar datos con dichas claves
        User::truncate();
        DB::table('role_user')->truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SpecialityTableSeeder::class);
        $this->call(UnitiesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);


        DB::table('role_user')->insert(array(
                array('user_id' => 1, 'role_id' => 1),
                array('user_id' => 2, 'role_id' => 2),
                array('user_id' => 3, 'role_id' => 2),
                array('user_id' => 4, 'role_id' => 2),
                array('user_id' => 5, 'role_id' => 2),
                array('user_id' => 6, 'role_id' => 2),
                array('user_id' => 7, 'role_id' => 2),
                array('user_id' => 8, 'role_id' => 2),
                array('user_id' => 9, 'role_id' => 2),
                array('user_id' => 10, 'role_id' => 2),
                array('user_id' => 11, 'role_id' => 2),
                array('user_id' => 12, 'role_id' => 2),
                array('user_id' => 13, 'role_id' => 3),
                array('user_id' => 14, 'role_id' => 3),
                array('user_id' => 15, 'role_id' => 3),
                array('user_id' => 16, 'role_id' => 3),
                array('user_id' => 17, 'role_id' => 3),
                array('user_id' => 18, 'role_id' => 3),
                array('user_id' => 19, 'role_id' => 3),
                array('user_id' => 20, 'role_id' => 4),
                array('user_id' => 21, 'role_id' => 4),
                array('user_id' => 22, 'role_id' => 4),
                array('user_id' => 23, 'role_id' => 4),
                array('user_id' => 24, 'role_id' => 4),
                array('user_id' => 25, 'role_id' => 4),
                array('user_id' => 26, 'role_id' => 4),
                array('user_id' => 27, 'role_id' => 4),
                array('user_id' => 28, 'role_id' => 4),
                array('user_id' => 29, 'role_id' => 4),
                array('user_id' => 30, 'role_id' => 4),
                array('user_id' => 31, 'role_id' => 4),
                array('user_id' => 32, 'role_id' => 4),
                array('user_id' => 33, 'role_id' => 4)
            ));
        DB::table('permission_role')->insert(array(
                array('permission_id' => 1, 'role_id' => 1),
                array('permission_id' => 2, 'role_id' => 1),
                array('permission_id' => 3, 'role_id' => 1),
                array('permission_id' => 4, 'role_id' => 1),
                array('permission_id' => 1, 'role_id' => 2),
                array('permission_id' => 2, 'role_id' => 2),
                array('permission_id' => 4, 'role_id' => 2)
            ));
    }
}

