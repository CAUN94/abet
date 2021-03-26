<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPFieldsToReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->integer('pb')->nullable()->default('20');;
            $table->integer('pd')->nullable()->default('30');;
            $table->integer('pp')->nullable()->default('30');;
            $table->integer('pm')->nullable()->default('20');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('pb');
            $table->dropColumn('pd');
            $table->dropColumn('pp');
            $table->dropColumn('pm');
        });
    }
}
