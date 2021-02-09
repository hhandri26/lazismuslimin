<?php

use Illuminate\Database\Seeder;

class t_group_menu extends Seeder
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
        		'nama'	=>'menu 1',
        		'level'	=>'2',
        		'icon'	=>'fa fa-book'

        	],
        	[
        		'nama'	=>'menu 2',
        		'level'	=>'2',
        		'icon'	=>'fa fa-book'
        	],

        ];

        DB::table('t_group_menu')->insert($data);
    }
}
