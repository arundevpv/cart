<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (30/1/15)
	 */
	public function up()
	{
		Schema::create('product_images', function(Blueprint $table)
		{
			$table->engine = "InnoDB";
			$table->increments('id');
			$table->integer('add_id')->unsigned();
			$table->foreign('add_id')->references('id')->on('adds')->onDelete('cascade');
			$table->string('image_name');
			$table->boolean('is_active')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 * Created By Arun @ Itmarkerz (30/1/15)
	 */
	public function down()
	{
		Schema::drop('product_images');
	}

}
