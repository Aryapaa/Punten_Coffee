<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('email');
            $table->string('name');
            $table->integer('total_order');
            $table->bigInteger('total_amount');
            $table->integer('total_payment_method')->nullable()->change();
            $table->timestamps();

            $table->foreign('order_number')->references('id')->on('order_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
