<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFAQSTable.
 */
class CreateFAQSTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq', function(Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
            $table->integer('order');
            $table->integer('status')->default(1);
            $table->integer('active')->default(1);
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
		Schema::drop('faq');
	}
}
