<?php

use Illuminate\Database\Seeder;

class t_level_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	[
        		'level'			=>'1',
        		'description'	=>'hak akses admin',

        	],
        	[
        		'level'			=>'2',
        		'description'	=>'hak akses pengguna',
        	]
        ];

        DB::table('t_level_users')->insert($data);
    }
}
