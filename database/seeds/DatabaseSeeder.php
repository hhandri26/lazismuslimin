<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       // $this->call(t_level_usersTableSeeder::class);
        //$this->call(t_group_menu::class);
        $this->call(t_sub_menu::class);
    }
}
