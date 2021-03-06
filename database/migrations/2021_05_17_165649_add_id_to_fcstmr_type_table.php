<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToFcstmrTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*add increment ID column in fcstmr_type*/
        if(Schema::hasTable('FCSTMR_Type')){   
            Schema::table('FCSTMR_Type', function (Blueprint $table) {
                $table->unsignedInteger('id',true)->first();
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
        if(Schema::hasTable('FCSTMR_Type') && Schema::hasColumn('FCSTMR_Type','ID')){   
            Schema::table('FCSTMR_Type', function (Blueprint $table) {
                    $table->dropColumn('id');
            });
        }
    }
}
