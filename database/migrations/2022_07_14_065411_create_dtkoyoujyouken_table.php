<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtkoyoujyoukenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtkoyoujyouken', function (Blueprint $table) {
            $table->integer('id');
            $table->string('user_id');
            $table->integer('main_company_id');
            $table->integer('side_company_id');
            $table->string('contract_no');
            $table->string('mainsub_flag');
            $table->string('goui_flag');
            $table->string('koyoukikan_flag');
            $table->integer('syoteijikan_start');
            $table->integer('syoteijikan_end');
            $table->integer('syoteijikan_total');
            $table->integer('syotei_days');
            $table->integer('kyukeijikan_start');
            $table->integer('kyukeijikan_end');
            $table->integer('kyukeijikan_total');
            $table->integer('shimebi');
            $table->string('youbi');
            $table->string('gyoumunaiyou');
            $table->integer('keiyaku_start');
            $table->integer('keiyaku_end');
            $table->integer('yukyuzan');
            $table->integer('tokukyuzan');
            $table->string('department1');
            $table->string('department2');
            $table->string('employee_mail');
            $table->integer('kuyou_code');
            $table->integer('F_shiyousya');
            $table->integer('F_roudousya');
            $table->date('tourokubi');
            $table->string('email_send');
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
        Schema::dropIfExists('dtkoyoujyouken');
    }
}
