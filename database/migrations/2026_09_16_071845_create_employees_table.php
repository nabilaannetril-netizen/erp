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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('department_id')->constrained()->nullable();
            $table->foreignId('position_id')->constrained()->nullable();
            $table->timestamps();
            $table->string('address')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('religion', ['muslim', 'christian', 'catholic', 'hindu', 'buddha'])->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('salary')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->String('image')->nullable();
            $table->enum('status', ['applicant', 'active', 'trainee', 'x'])->nullable();
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