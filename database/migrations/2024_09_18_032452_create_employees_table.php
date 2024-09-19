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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no')->unique();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('education')->nullable();
            $table->string('specialization')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('shift_id')->constrained()->cascadeOnDelete();
            $table->boolean('face')->default(false);
            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
