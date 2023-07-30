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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id');
            $table->string('name');
            $table->string('glasses_type');
            $table->enum('client', ['local', 'VIP']);
            $table->string('degree');
            $table->string('Lenses_type');
            $table->string('comments');
            $table->float('price');
            $table->float('paid_up');
            $table->float('the_rest');
            $table->enum('status', ['received', 'not_received']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
