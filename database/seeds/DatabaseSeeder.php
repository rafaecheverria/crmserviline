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


        for($i=1; $i <= 30; $i++) {
                DB::table('role_user')->insert(
                    [
                        'user_id' => User::all()->randomElement('id'),
                        'role_id' => Role::all()->randomElement('id'),
                    ]
                );
        }
        //$user_id = User::pluck('id')->all();
        //$role_id = Role::pluck('id')->all();

        /*for($i=1; $i <= 30; $i++) {

            DB::table('role_user')->insert([
                'user_id' => $user_id,
                'role_id' => $role_id
            ]);
        //factory(Role::class, $role_user)->create()->each(
        /* function($roles){ 
    			$usuarios = User::all()->random(mt_rand(1, 3))->pluck('id'); //se obtiene un conjunto aleatoreo de usuarios
    			$roles->users()->attach($usuarios); // se le insertan usuarios a las roles
		    });
        }*/
    }
}

