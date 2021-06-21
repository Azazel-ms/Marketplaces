<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSourceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('source_providers', function (Blueprint $table) {
            $table->string("description")->nullable();
            $table->string("url")->nullable();
        });
        /*id 
        name
        description
        url */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('source_providers', function (Blueprint $table) {
            $table->dropColumn('nosotros');
        });
    }
}
