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
        Schema::create('expense_models', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->nullable();
            $table->string('amount');
            $table->string('profile_id');
            $table->string('purpose')->nullable();
            $table->string('type')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_models');
    }
};
