<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtkintaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtkintai', function (Blueprint $table) {
            $table->integer('id');
            $table->string('user_id');
            $table->integer('main_company_id');
            $table->integer('side_company_id');
            $table->string('contract_no');
            $table->integer('kinmu_year');
            $table->integer('kinmu_month');
            $table->integer('kinmu_day');
            $table->string('sinsei_flg');
            $table->integer('sigyou_jikoku');
            $table->integer('syuugyou_jikoku');
            $table->integer('kyukei_jikan');
            $table->integer('jitsukinmu');
            $table->integer('syoteigai');
            $table->integer('houteigai');
            
            $table->timestamp('deleted_at')->nullable();
            $table->primary(array('id', 'user_id'));
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
        Schema::dropIfExists('dtkintai');
    }
}
