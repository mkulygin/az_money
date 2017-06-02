<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAzAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('az_accounts', function (Blueprint $table)
        {

        	$table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->float('balance');
            $table->integer('dealer_id')->unsigned()->unique();
            $table->foreign('dealer_id')->references('id')->on('az_dealers');
            $table->string('status_')->nullable();
            $table->index('status_');
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
		Schema::dropIfExists('az_accounts');
    }
}
