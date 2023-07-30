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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();
            $table->string('name');
            $table->string('glasses_type');
            $table->enum('client', ['local', 'VIP']);
            $table->string('degree');
            $table->string('Lenses_type');
            $table->string('comments');
            $table->float('price');
            $table->float('paid_up')->default(0);
            $table->float('the_rest')->default(0);
            $table->enum('status', ['received', 'not_received']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
