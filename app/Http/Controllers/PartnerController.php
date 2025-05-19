<?php

namespace App\Http\Controllers;

use App\Models\CRM;
use App\Models\Faktur;
use App\Models\Partner;
use App\Models\Software;
use App\Models\AccountType;
use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Models\PartnerCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function form()
    {
        $categories = PartnerCategory::all();
        $accountTypes = AccountType::all();
        $fakturs = Faktur::all();
        $identityTypes = IdentityType::all();
        $softwares = Software::all();
        $crms = CRM::all();

        return view('partner.form', compact(
            'categories',
            'crms',
            'accountTypes',
            'fakturs',
            'identityTypes',
            'softwares'
        ));
    }
    public function store(Request $request)
    {
        try {

            // dd($request->all());
        // Validate and store the data
        $validatedData = Validator::make($request->all(), [
            'partner_category_id' => 'required',
            'account_type_id' => 'required',
            'company_name' => 'required|string|max:255',
            'office_address' => 'required|string',
            'invoice_address' => 'required|string',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|digits_between:3,10',
            'province' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'faktur_id' => 'required',

            // Step 2: Owner/Director Info
            'owner_name' => 'required|string|max:255',
            'identity_type_id' => 'required',
            'identity_number' => 'required|string|max:100',
            'owner_mobile' => 'required|numeric',
            'owner_email' => 'required|email|unique:partners|max:255',

            // Step 3: Financial / Tax Info
            'npwp' => 'nullable|string|max:50',
            'bank_transfer' => 'nullable|string|max:100',
            'bank_account_name' => 'nullable|string|max:100',

            // Step 4: PIC Info
            // Finance
            'finance_name' => 'nullable|string|max:100',
            'finance_mobile' => 'nullable|numeric',
            'finance_email' => 'nullable|email|unique:partners|max:255',

            // Business / Commercial
            'business_name' => 'nullable|string|max:100',
            'business_mobile' => 'nullable|numeric',
            'business_email' => 'nullable|email|unique:partners|max:255',

            'cs_name' => 'required|string|max:100',
            'cs_mobile' => 'required|numeric',
            'cs_tm' => 'nullable|string',
            'cs_email' => 'nullable|email|unique:partners|max:255',

            'tech_name' => 'required|string|max:100',
            'tech_mobile' => 'required|numeric',
            'tech_tm' => 'nullable|string',
            'tech_email' => 'required|email|max:255',

            // Technical Info
            'software_id' => 'required',
            'ip_address' => 'required|unique:partners|max:45',
            'url_callback' => 'required|max:255',
            'crm_id' => 'required',
        ]);

        // $validatorData = $validator->validated();
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $reqBody = $validatedData->validated();


        // get partner by ip address
        $partner = Partner::where('ip_address', $reqBody['ip_address'])->first();
        if ($partner) {
            return redirect()->back()->with('error', 'IP Address already exists!');
        }


        Partner::create([
            'partner_category_id' => $reqBody['partner_category_id'],
            'account_type_id' => $reqBody['account_type_id'],
            'company_name' => $reqBody['company_name'],
            'office_address' => $reqBody['office_address'],
            'invoice_address' => $reqBody['invoice_address'],
            'city' => $reqBody['city'],
            'zip_code' => $reqBody['zip_code'],
            'province' => $reqBody['province'],
            'country' => $reqBody['country'],
            'faktur_id' => $reqBody['faktur_id'],

            // Step 2: Owner/Director Info
            'owner_name' => $reqBody['owner_name'],
            'identity_type_id' => $reqBody['identity_type_id'],
            'identity_number' => $reqBody['identity_number'],
            'owner_mobile' => $reqBody['owner_mobile'],
            'owner_email' => $reqBody['owner_email'],

            // Step 3: Financial / Tax Info
            'npwp' => $reqBody['npwp'],
            'bank_transfer' => $reqBody['bank_transfer'],
            'bank_account_name' => $reqBody['bank_account_name'],

            // Step 4: PIC Info
            'finance_name' => $reqBody['finance_name'],
            'finance_mobile' => $reqBody['finance_mobile'],
            'finance_email' => $reqBody['finance_email'],

            'business_name' => $reqBody['business_name'],
            'business_mobile' => $reqBody['business_mobile'],
            'business_email' => $reqBody['business_email'],

            'cs_name' => $reqBody['cs_name'],
            'cs_mobile' => $reqBody['cs_mobile'],
            'cs_tm' => $reqBody['cs_tm'],
            'cs_email' => $reqBody['cs_email'],

            'tech_name' => $reqBody['tech_name'],
            'tech_mobile' => $reqBody['tech_mobile'],
            'tech_tm' => $reqBody['tech_tm'],
            'tech_email' => $reqBody['tech_email'],

            // Technical Info
            'software_id' => $reqBody['software_id'],
            'ip_address' => $reqBody['ip_address'],
            'url_callback' => $reqBody['url_callback'],
            'crm_id' => $reqBody['crm_id'],
        ]);



            return redirect()->back()->with('success', 'Partner information saved successfully!');
            //code...
        } catch (\Exception $e) {

            Log::channel('daily')->error($e->getMessage());
            return redirect()->back()->with('error', 'Partner information saved failed!');

        }


    }
}
