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
        Schema::create('identity_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->default('KTP');
            $table->timestamps();
        });

        // Seed default values
        DB::table('identity_type')->insert([
            ['name' => 'KTP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SIM', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Passport', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'NPWP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'KIMS/KITAS/KITAP', 'created_at' => now(), 'updated_at' => now()],
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
