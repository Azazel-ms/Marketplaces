<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMarketplaceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("marketplace_id");
            $table->string("field");
            $table->string("option_value");
            $table->bigInteger("option_id");
        });
        /* id
        marketplace_id
        field
        option_value
        option_id */
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
