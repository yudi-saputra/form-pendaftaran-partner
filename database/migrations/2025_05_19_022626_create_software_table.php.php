<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Seed default values
        DB::table('software')->insert([
            ['name' => 'OtomaX', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IRS', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'InHouse', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ST24', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lainnya', 'created_at' => now(), 'updated_at' => now()],

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
