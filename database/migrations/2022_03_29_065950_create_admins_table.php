<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('email', 200)->unique();
            $table->string('password', 200);
            $table->string('phone', 20);
            $table->string('address', 200);
            $table->date('birthday')->nullable();
            $table->string('avatar', 200)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('gender')->default(0);
            $table->dateTime('last_login')->nullable();
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
        Schema::dropIfExists('admins');
    }
};
