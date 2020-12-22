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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 40)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('employee_id', 30)->nullable();
            $table->enum('gender', ['m', 'f'])->nullable();
            $table->boolean('active_doctor')->default(false);
            $table->boolean('active_admin')->default(false);
            $table->string('position')->nullable();
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
