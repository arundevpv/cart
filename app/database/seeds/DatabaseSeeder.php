<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 * Modified By Arun @ Itmarkerz(31/1/15)
	 */
	public function run()
	{
	   Eloquent::unguard();
	   //disable foreign key check for this connection before running seeders
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	   $this->call('GroupSeeder');
	   $this->call('UserSeeder');
	   $this->call('UserGroupSeeder');
	   DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
