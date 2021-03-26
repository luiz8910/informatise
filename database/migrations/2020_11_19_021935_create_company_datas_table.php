<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCompanyDatasTable.
 */
class CreateCompanyDatasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_data', function(Blueprint $table) {
            $table->increments('id');
            $table->text('opening_hours')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('messenger')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('email')->nullable();
            $table->string('picture')->nullable();
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
		Schema::drop('company_data');
	}
}
