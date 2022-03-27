<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblComboTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comboTicket', function (Blueprint $table) {
            $table->Increments('combo_id');
            $table->string('combo_code');
            $table->string('combo_name');
            $table->dateTime('res_date');
            $table->dateTime('EXP');
            $table->string('priceTicket');
            $table->string('priceCombo')->nullable();
            $table->integer('qty')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('tbl_comboTicket');
    }
}
