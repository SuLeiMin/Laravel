<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtcompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtcompany', function (Blueprint $table) {
            $table->id();
            $table->integer("incharge_id");
            $table->string('company_name');
            $table->string('zipcode');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('tel');
            $table->string('department1');
            $table->string('department2')->nullable();
            $table->string('kessai');
            $table->integer('seikyu_shimei');
            $table->integer('kijitsu');
            $table->string('remark')->nullable();
            $table->string('remark2')->nullable();
            $table->string('remark3')->nullable();
            $table->string('email_send');
            $table->string('contract_no')->nullable();
            $table->string('syoteijikan')->nullable();
            $table->string('kyuukeijikan')->nullable();
            $table->string('youbi')->nullable();
            $table->string('keiyakukikan')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger("employee_id")->nullable(); 
            $table->foreign('employee_id')->references('id')->on('mtemployees');
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
        Schema::dropIfExists('mtcompany');
    }
}
