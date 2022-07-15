<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlist', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('company_id');
            $table->string('user_id');
            $table->string('password');
            $table->string('username');
            $table->string('user_tel');
            $table->string('department1');
            $table->string('department2');
            $table->integer('F_tantousya');
            $table->primary(array('id', 'user_id'));
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
        Schema::dropIfExists('userlist');
    }
}
