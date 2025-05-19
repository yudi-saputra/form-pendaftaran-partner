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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            // Step 1: Company General Information
            $table->string('partner_category');
            $table->string('account_type');
            $table->string('company_name');
            $table->text('office_address');
            $table->text('invoice_address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('province');
            $table->string('country');
            $table->string('faktur');

            // Step 2: Owner/Director Info
            $table->string('owner_name');
            $table->string('identity_type');
            $table->string('identity_number');
            $table->string('owner_mobile');
            $table->string('owner_email');

            // Step 3: Financial / Tax Info
            $table->string('npwp');
            $table->string('bank_transfer');
            $table->string('bank_account_name');

            // Step 4: PIC Info
            // Technical
            $table->string('tech_name');
            $table->string('tech_mobile');
            $table->string('tech_email');
            // Finance
            $table->string('finance_name');
            $table->string('finance_mobile');
            $table->string('finance_email');
            // Business
            $table->string('business_name');
            $table->string('business_mobile');
            $table->string('business_email');
            // Customer Service
            $table->string('cs_name');
            $table->string('cs_mobile');
            $table->string('cs_email');

            // Technical Info
            $table->string('software_system');
            $table->string('ip_address');
            $table->string('url_callback');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
