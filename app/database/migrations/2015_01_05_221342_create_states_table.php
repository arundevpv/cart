<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (6/2/15)
	 */
	public function up()
	{
		/*Schema::create('states', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('id');
			$table->string('state_name');
			$table->boolean('is_active')->default(1); //active
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (6/2/15)
	 */
	public function down()
	{
		//Schema::drop('states');
	}

}