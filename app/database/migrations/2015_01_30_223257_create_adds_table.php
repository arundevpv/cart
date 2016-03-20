<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (30/1/15)
	 */
	public function up()
	{
		Schema::create('adds', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			//$table->string('photo');	//no need
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
			//$table->integer('city_id')->unsigned();
			//$table->foreign('city_id')->references('city_id')->on('cities'); // may be remove later
			$table->boolean('available_for')->default(1);	// 1 =>sale,2=>buy
			$table->string('city_name')->nullable();
			$table->string('latitude')->nullable();			//refer for google map
			$table->string('longitude')->nullable();		//refer for google map
			$table->boolean('rental_period'); // hour,day,week,month
			$table->integer('rental_amount');
			$table->integer('security_deposit');
			$table->boolean('is_active')->default(1);	//active
			// remove this fields from this table in next verson
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->boolean('user_type')->default(1);	// 1 =>individual,2=>business
			$table->string('contact_no',15)->nullable();
			$table->timestamps();
			$table->softDeletes();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adds');
	}

}
