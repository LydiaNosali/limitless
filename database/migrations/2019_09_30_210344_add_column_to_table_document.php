<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTableDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_document', function (Blueprint $table) {
            $table->unsignedBigInteger('repertoire_id');
            $table->foreign('repertoire_id')->references('id')->on('table_repertoire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_document', function (Blueprint $table) {
            //
        });
    }
}
