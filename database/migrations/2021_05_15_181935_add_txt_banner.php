<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTxtBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table){
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function(Blueprint $table){
            $table->dropColumn('title');
            $table->dropColumn('subtitle');
            $table->dropColumn('text');
        });
    }
}
