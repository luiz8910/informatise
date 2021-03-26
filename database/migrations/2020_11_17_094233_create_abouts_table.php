<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAboutsTable.
 */
class CreateAboutsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abouts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('picture')->nullable();
            $table->string('title')->nullable();
            $table->text('about');
            $table->text('our_mission');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('abouts');
	}
}
