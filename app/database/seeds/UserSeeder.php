<?php
/*
	* Created By  Arun @ Itmarkerz(31/1/15)
*/
class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('adds')->truncate();
		DB::table('users')->truncate();
		DB::table('users')->insert(
                        array(
                                
									   array(
										'email' => 'admin@upforrent.com',
										'password'=>Hash::make('admin'),
										'first_name'=>'Admin',
										'activated'=>1,
										
                                       ),
										
									   
					));	
      
		
    }

}
?>