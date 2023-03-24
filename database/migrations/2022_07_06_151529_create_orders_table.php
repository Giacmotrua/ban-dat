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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code_order', 200)->unique();
            $table->string('name', 200);
            $table->string('phone', 20);
            $table->string('email', 200);
            $table->string('address', 200);
            $table->integer('money');
            $table->tinyInteger('status');
            $table->integer('quantity');
            $table->text('note')->nullable();
            $table->json('order_detail');
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
        Schema::dropIfExists('orders');
    }
};
