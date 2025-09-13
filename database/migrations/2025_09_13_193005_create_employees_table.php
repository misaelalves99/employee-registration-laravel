<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf', 14)->unique();
            $table->string('email')->unique();
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('position', 50);
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->decimal('salary', 10, 2);
            $table->date('admission_date');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
