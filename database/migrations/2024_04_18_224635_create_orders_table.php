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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->foreignId('user_id')->constrained();
            $table->string('customer');
            $table->boolean('paid')->default(false);
            $table->enum('status',['new','in_process','finished','delivered']);
            $table->boolean('delivery')->default(false);
            $table->string('address')->nullable();
            $table->double('delivery_price')->nullable();
            $table->datetime('delivery_date');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
