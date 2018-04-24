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

        DB::table('speciality_user')->insert(array(

                 array('user_id' => 852, 'speciality_id' => 1),
                 array('user_id' => 853, 'speciality_id' => 1),
                 array('user_id' => 4,   'speciality_id' => 1),
                 array('user_id' => 852, 'speciality_id' => 2),

            ));

        DB::table('permission_role')->insert(array(

                 array('role_id' => 1, 'permission_id' => 1),
                 array('role_id' => 1, 'permission_id' => 2),
                 array('role_id' => 1,   'permission_id' => 3),
                 array('role_id' => 1, 'permission_id' => 4),
                 array('role_id' => 1, 'permission_id' => 5),
                 array('role_id' => 1, 'permission_id' => 6),
                 array('role_id' => 1,   'permission_id' => 7),
                 array('role_id' => 1, 'permission_id' => 8),
                 array('role_id' => 1, 'permission_id' => 9),
                 array('role_id' => 1, 'permission_id' => 10),
                 array('role_id' => 1,   'permission_id' => 11),
                 array('role_id' => 1, 'permission_id' => 12),
                 array('role_id' => 1, 'permission_id' => 13),
                 array('role_id' => 1, 'permission_id' => 14),
                 array('role_id' => 1,   'permission_id' => 15),
                 array('role_id' => 1, 'permission_id' => 16),
                 array('role_id' => 1, 'permission_id' => 17),
                 array('role_id' => 1, 'permission_id' => 18),
                 array('role_id' => 1,   'permission_id' => 19),
                 array('role_id' => 1, 'permission_id' => 20),
                 array('role_id' => 1, 'permission_id' => 21),
                 array('role_id' => 1, 'permission_id' => 22),
                 array('role_id' => 1,   'permission_id' => 23),
                 array('role_id' => 1, 'permission_id' => 24),
                 array('role_id' => 1, 'permission_id' => 25),
                 array('role_id' => 1, 'permission_id' => 26),
                 array('role_id' => 1,   'permission_id' => 27),
                 array('role_id' => 1, 'permission_id' => 28),
                 array('role_id' => 1, 'permission_id' => 29),
                 array('role_id' => 1, 'permission_id' => 30),
                 array('role_id' => 1,   'permission_id' => 31),
                 array('role_id' => 1, 'permission_id' => 32),
                 array('role_id' => 1, 'permission_id' => 33),
                 array('role_id' => 1, 'permission_id' => 34),
                 array('role_id' => 1,   'permission_id' => 35),
                 array('role_id' => 1, 'permission_id' => 36),
                 array('role_id' => 1,   'permission_id' => 37),
                 array('role_id' => 1, 'permission_id' => 38),
                 array('role_id' => 1, 'permission_id' => 39),
                 array('role_id' => 1, 'permission_id' => 40),
                 array('role_id' => 1,   'permission_id' => 41),
                 array('role_id' => 1, 'permission_id' => 42),
                 array('role_id' => 1,   'permission_id' => 43),
                 array('role_id' => 1, 'permission_id' => 44),

            ));


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
                array('user_id' => 33, 'role_id' => 4),

                array('user_id' => 34, 'role_id' => 2),
                array('user_id' => 35, 'role_id' => 2),
                array('user_id' => 36, 'role_id' => 2),
                array('user_id' => 37, 'role_id' => 2),
                array('user_id' => 38, 'role_id' => 2),
                array('user_id' => 39, 'role_id' => 2),
                array('user_id' => 40, 'role_id' => 2),
                array('user_id' => 41, 'role_id' => 2),
                array('user_id' => 42, 'role_id' => 2),
                array('user_id' => 43, 'role_id' => 2),
                array('user_id' => 44, 'role_id' => 2),
                array('user_id' => 45, 'role_id' => 2),
                array('user_id' => 46, 'role_id' => 2),
                array('user_id' => 47, 'role_id' => 2),
                array('user_id' => 48, 'role_id' => 2),
                array('user_id' => 49, 'role_id' => 2),
                array('user_id' => 50, 'role_id' => 2),
                array('user_id' => 51, 'role_id' => 2),
                array('user_id' => 52, 'role_id' => 2),
                array('user_id' => 53, 'role_id' => 2),
                array('user_id' => 54, 'role_id' => 2),
                array('user_id' => 55, 'role_id' => 2),
                array('user_id' => 56, 'role_id' => 2),
                array('user_id' => 57, 'role_id' => 2),
                array('user_id' => 58, 'role_id' => 2),
                array('user_id' => 59, 'role_id' => 2),
                array('user_id' => 60, 'role_id' => 2),
                array('user_id' => 61, 'role_id' => 2),
                array('user_id' => 62, 'role_id' => 2),
                array('user_id' => 63, 'role_id' => 2),
                array('user_id' => 64, 'role_id' => 2),
                array('user_id' => 65, 'role_id' => 2),
                array('user_id' => 66, 'role_id' => 2),
                array('user_id' => 67, 'role_id' => 2),
                array('user_id' => 68, 'role_id' => 2),
                array('user_id' => 69, 'role_id' => 2),
                array('user_id' => 70, 'role_id' => 2),
                array('user_id' => 71, 'role_id' => 2),
                array('user_id' => 72, 'role_id' => 2)
            ));

    }
}

