<?php

use Illuminate\Database\Seeder;

class t_sub_menu extends Seeder
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
        		'nama'			=>'sub menu 1',
        		'controller'	=>'controllermenu1',
        		'method'		=>'index',
        		'id_group_menu'	=>'1'

        	],
        	[
        		'nama'			=>'sub menu 2',
        		'controller'	=>'controllermenu2',
        		'method'		=>'index',
        		'id_group_menu'	=>'2'
        	],

        ];

        DB::table('t_sub_menu')->insert($data);
    }
}
