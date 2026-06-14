<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->decimal('subtotal', total: 8, places: 2);
            $table->decimal('discount', total: 8, places: 2);
            $table->decimal('tax', total: 8, places: 2);
            $table->decimal('grand_total', total: 8, places: 2);
            $table->enum('in_or_out', ['in', 'out'])->nullable();
            $table->boolean('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
