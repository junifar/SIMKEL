<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelurahan_id');
            $table->integer('rukun_warga_id');
            $table->string('name')->nullable();
            $table->unique(array('kelurahan_id', 'rukun_warga_id'));
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
        Schema::dropIfExists('kelurahan_details');
    }
}
