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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['active','completed','inactive'])->default('inactive');
            $table->enum('campaign_type', ['discount', 'buy1get1', 'bundle', 'loyalty', 'seasonal', 'flash_sale', 'cashback', 'referral'])->default('discount');
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('target_revenue', 12, 2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('banner')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
