<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('dob')->nullable();
            $table->date('anniversary_date')->nullable();
            $table->enum('marital_status', ['1', '0'])->default('0')->comment('0=>single,1=>Married');
            $table->enum('user_type', ['1', '0'])->default('0')->comment('0=>user,1=>admin');
            $table->enum('status', ['1','2', '0'])->default('0')->comment('0=>new,1=>accept,2=>reject');
            $table->string('gender')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
