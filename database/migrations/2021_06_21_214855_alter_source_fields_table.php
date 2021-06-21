<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSourceFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('source_fields', function (Blueprint $table) {
            $table->string("source_provider_field")->nullable();
            $table->string("mercadocontrol_field")->nullable();
        });
        /* id
    source_provider_id
    source_provider_field 
    mercadocontrol_field */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('source_fields', function (Blueprint $table) {
            $table->dropColumn("name");
            $table->dropColumn("data_type");
            $table->dropColumn("data_long");
            $table->dropColumn("description");
        });
        
    }
}
