<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePersonLotTableFieldNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_lot', function (Blueprint $table) {
            $table->renameColumn('person', 'person_id');
            $table->renameColumn('lot', 'lot_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_lot', function (Blueprint $table) {
            $table->renameColumn('person_id', 'person');
            $table->renameColumn('lot_id', 'lot');
        });
    }
}
