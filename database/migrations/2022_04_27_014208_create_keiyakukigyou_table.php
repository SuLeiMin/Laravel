<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeiyakukigyouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keiyakukigyou', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('postnumber');
            $table->string('address1');
            $table->string('address2');
            $table->string('telephone');
            $table->string('dept1');
            $table->string('dept2');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('keiyakukigyou');
    }
}
