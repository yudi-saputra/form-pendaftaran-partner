<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = [
        // Company General Information
        'partner_category_id',
        'account_type_id',
        'company_name',
        'office_address',
        'invoice_address',
        'city',
        'zip_code',
        'province',
        'country',
        'faktur_id',
        'owner_name',
        'identity_type_id',
        'identity_number',
        'owner_mobile',
        'owner_email',
        'npwp',
        'bank_transfer',
        'bank_account_name',
        // Finance
        'finance_name',
        'finance_mobile',
        'finance_email',
        // Business
        'business_name',
        'business_mobile',
        'business_email',
        // Customer Service
        'cs_name',
        'cs_mobile',
        'cs_tm',
        'cs_email',
        // Technical
        'tech_name',
        'tech_mobile',
        'tech_tm',
        'tech_email',

        // Technical Info
        'software_id',
        'ip_address',
        'url_callback',
        'crm_id'
    ];
}
