<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtcompanyMtemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtcompany_mtemployees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("mtcompany_id");
            $table->unsignedInteger("mtemployees_id");
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
        Schema::dropIfExists('mtcompany_mtempoyee');
    }
}
