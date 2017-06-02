<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAzDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('az_dealers', function(Blueprint $table)
        {
       		$table->engine = 'InnoDB';
      	    $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status_')->nullable();   // new, active, expired
            $table->index('status_');
            $table->dateTime('expired_datetime')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('az_dealers');
    }
}
