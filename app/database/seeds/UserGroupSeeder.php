<?php
/*
	* Created By  Arun @ Itmarkerz(31/1/15)
*/
class UserGroupSeeder extends Seeder {

    public function run()
    {
        DB::table('users_groups')->truncate();
		DB::table('users_groups')->insert(
                        array(
                                array(
										'user_id'=>1,
										'group_id'=>1
										
                                       ),
									  
							));	
      
		
    }

}
?>