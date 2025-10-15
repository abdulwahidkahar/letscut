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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');

            $table->date('queue_date');
            $table->integer('queue_number');
            $table->enum('status', ['waiting', 'serving', 'finished', 'cancelled'])->default('waiting');
            $table->timestamps();

            $table->unique(['queue_date', 'queue_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
