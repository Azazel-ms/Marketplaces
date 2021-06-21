<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMercadocontrolItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadocontrol_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("barcode");
            $table->string("category");
            $table->string("brand");
            $table->string("title");
            $table->string("model");
            $table->string("mpn");
            $table->string("description");
            $table->string("data");
        });
        /* 
        barcode
        category
        brand
        title
        model
        mpn
        description
        data   
            */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
