<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skill_levels', function (Blueprint $table) {
            $table->foreignId('skill_type_id')
                ->nullable()
                ->constrained('skill_types')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('skill_levels', function (Blueprint $table) {
            $table->dropConstrainedForeignId('skill_type_id');
        });
    }
};
