<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMarketplaceFiledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketplace_fields', function (Blueprint $table) {
            $table->timestamps();
            $table->string("mercadocontrolfield")->nullable();
            $table->string("marketplace_field")->nullable();
        });
        /* id
    marketplace_id
    mercadocontrol_field
    marketplace_field */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::table('marketplace_fields', function (Blueprint $table) {
            $table->dropColumn("name");
            $table->dropColumn("data_type");
            $table->dropColumn("data_long");
    });
    }
}
