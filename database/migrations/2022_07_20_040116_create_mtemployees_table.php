<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtemployees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("incharge_id")->nullable();
            $table->unsignedInteger('billing_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->integer('employee_id')->comment('労働者ID');
            $table->integer('main_company_id')->comment('使用者(主)ID');
            $table->integer('side_company_id')->comment('使用者(副)ID');
            $table->string('contract_no', 30)->comment('契約番号');
            $table->string('mainsub_flag', 1)->comment('主副フラグ');
            $table->string('goui_flag', 15)->comment('契約合意確認フラグ');
            $table->string('koyoukikan_flag', 1)->comment('F_雇用期間の定めなし');
            $table->integer('syoteijikan_start')->comment('所定労働時間開始');
            $table->integer('syoteijikan_end')->comment('所定労働時間終了');
            $table->integer('syoteijikan_total')->comment('所定労働時間計');
            $table->integer('syotei_days')->comment('所定労働日数');
            $table->integer('kyukeijikan_start')->comment('休憩時間開始');
            $table->integer('kyukeijikan_end')->comment('休憩時間終了');
            $table->integer('kyukeijikan_total')->comment('休憩時間計');
            $table->integer('shimebi')->comment('締日');
            $table->string('youbi', 7)->comment('勤務曜日');
            $table->string('gyoumunaiyou', 100)->comment('業務内容');
            $table->integer('keiyaku_start')->comment('契約期間開始');
            $table->integer('keiyaku_end')->comment('契約期間終了');
            $table->integer('yukyuzan')->comment('有給休暇残日数');
            $table->string('department1', 20)->comment('部署1');
            $table->string('department2', 20)->comment('部署2');
            $table->string('employee_email', 100)->comment('労働者e-mail');
            $table->integer('koyou_code')->comment('雇用形態コード');
            $table->integer('F_shiyousya')->comment('使用者確認フラグ');
            $table->integer('F_roudousya')->comment('労働者確認フラグ');
            $table->date('tourokubi')->comment('登録年月日');
            $table->boolean('email_send')->nullable()->comment('登録メール通知');
            $table->softDeletes()->comment('論理削除日時 : この値がnullでなければ、削除とみなす');
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
        Schema::dropIfExists('mtemployees');
    }
}
