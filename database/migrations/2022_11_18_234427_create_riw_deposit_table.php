<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riw_deposit', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("deposit_id")->unsigned();
            $table->foreign("deposit_id")
                  ->references('id')
                  ->on('deposit')
                  ->onDelete('CASCADE')
                  ->onUpdate('CASCADE');

            $table->string('riw_deposit')->nullable();
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
        Schema::dropIfExists('riw_deposit');
    }
};
