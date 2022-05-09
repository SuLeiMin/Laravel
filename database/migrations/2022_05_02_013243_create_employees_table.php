<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('zip_code');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('telephone');
            $table->string('dept1');
            $table->string('dept2')->nullable();
            $table->unsignedInteger('in_charge_id');
            $table->enum("payment_method", ["credit", "debit", "invoice"]);
            $table->date("deadline1")->nullable();
            $table->date("deadline2")->nullable();
            $table->text("remark")->nullable();
            $table->boolean("noti")->default(0);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
