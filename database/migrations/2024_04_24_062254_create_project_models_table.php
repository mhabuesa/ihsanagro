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
        Schema::create('project_models', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->longText('address');
            $table->string('start_date');
            $table->string('land_amount');
            $table->string('land_owner')->nullable();
            $table->string('owner_bill')->nullable();
            $table->string('owner_installment')->nullable();
            $table->string('lease_holder')->nullable();
            $table->string('lease_bill')->nullable();
            $table->string('lease_installment')->nullable();
            $table->string('contract_bill');
            $table->string('duration');
            $table->longText('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_models');
    }
};
