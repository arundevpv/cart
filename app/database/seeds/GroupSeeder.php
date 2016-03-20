<?php
/*
	* Created By Arun @ Itmarkerz(31/1/15)
*/
class GroupSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->truncate();
		DB::table('groups')->insert(
                        array(
                                array(
										'name' => 'Admin',
										'permissions'=>'{"admin":1}',
                                       ),
                           	 array(
									'name' => 'Users',
									'permissions'=>'{"user":1}',
								 )	 
								 
									 
			));	
      
		
    }

}
?>