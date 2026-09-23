<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {

            if (!Schema::hasColumn('employees', 'name')) {
                $table->string('name')->nullable()->after('user_id');
            }

            if (!Schema::hasColumn('employees', 'email')) {
                $table->string('email')->nullable()->after('name');
            }

            if (!Schema::hasColumn('employees', 'phone_number')) {
                $table->string('phone_number')->nullable()->after('email');
            }

            if (!Schema::hasColumn('employees', 'address')) {
                $table->string('address')->nullable()->after('phone_number');
            }

            if (!Schema::hasColumn('employees', 'department_id')) {
                $table->foreignId('department_id')
                    ->nullable()
                    ->after('address')
                    ->constrained('departments')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('employees', 'position_id')) {
                $table->foreignId('position_id')
                    ->nullable()
                    ->after('department_id')
                    ->constrained('positions')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('employees', 'place_of_birth')) {
                $table->string('place_of_birth')->nullable();
            }

            if (!Schema::hasColumn('employees', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable();
            }

            if (!Schema::hasColumn('employees', 'gender')) {
                $table->string('gender')->nullable();
            }

            if (!Schema::hasColumn('employees', 'religion')) {
                $table->string('religion')->nullable();
            }

            if (!Schema::hasColumn('employees', 'salary')) {
                $table->decimal('salary', 15, 2)->nullable();
            }

            if (!Schema::hasColumn('employees', 'start_date')) {
                $table->date('start_date')->nullable();
            }

            if (!Schema::hasColumn('employees', 'end_date')) {
                $table->date('end_date')->nullable();
            }

            if (!Schema::hasColumn('employees', 'status')) {
                $table->string('status')->default('Active');
            }
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {

            if (Schema::hasColumn('employees', 'position_id')) {
                $table->dropForeign(['position_id']);
            }

            if (Schema::hasColumn('employees', 'department_id')) {
                $table->dropForeign(['department_id']);
            }

            $columns = [
                'name',
                'email',
                'phone_number',
                'address',
                'department_id',
                'position_id',
                'place_of_birth',
                'date_of_birth',
                'gender',
                'religion',
                'salary',
                'start_date',
                'end_date',
                'status',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('employees', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};