<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('properties')) {
            Schema::create('properties', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('currency_id');
                $table->string('show_name');
                $table->string('explorer');
                $table->integer('show_order');
                $table->float('deposit');
                $table->float('withdraw');
                $table->boolean('has_tag')->default(0);
                $table->float('withdraw_min');
                $table->float('withdraw_fee');
                $table->float('deposit_min');
                $table->timestamps();
                $table->index('currency_id');
                $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('NO ACTION');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
