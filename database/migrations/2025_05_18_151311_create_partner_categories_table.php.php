<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partner_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Wholesale, Retail
            $table->timestamps();
        });

        // Seed default values
        DB::table('partner_categories')->insert([
            ['name' => 'Wholesale', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Retail', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
