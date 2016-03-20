<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (6/2/15)
	 */
	public function up()
	{
		/*Schema::create('cities', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('city_id');
			$table->string('city_name');
			//$table->string('city_state');
			$table->integer('state_id')->unsigned();
			$table->foreign('state_id')->references('id')->on('states');
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
		//Schema::drop('cities');
	}

}
