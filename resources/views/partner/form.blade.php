<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Form Partnership | Multimakmur</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    {{-- Card Body --}}
    <div class="container min-vh-100 d-flex justify-content-center align-items-start py-5">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="shadow p-4 p-md-5 rounded bg-white">
                <h1 class="mb-3 text-center fs-3">Form Pendaftaran</h1>
                <p class="text-muted mb-4 text-center">Pastikan semua informasi yang Anda berikan akurat dan lengkap.
                </p>
                <hr class="mb-4" />

                @include('layouts.message')

                <form action="{{ route('partner.store') }}" method="POST">
                    @csrf

                    <!-- Step 1 : Informasi Umum Perusahaan-->
                    <h6 class="mb-3"><i class="mdi mdi-office-building-outline"></i> Informasi Umum Perusahaan</h6>

                    {{-- Group Kategori, Jenis Akun & Faktur --}}
                    <div class="row g-3">
                        <!-- Kategori -->
                        <div class="col-md-4">
                            <div class="select-style-1">
                                <label for="partner_category_id">Kategori <span class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="partner_category_id" class="form-select" name="partner_category_id"
                                        required>
                                        <option value="" {{ old('partner_category_id') ? '' : 'selected' }}>--
                                            Pilih --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('partner_category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Kategori End -->

                        <!-- Jenis Akun -->
                        <div class="col-md-4">
                            <div class="select-style-1">
                                <label for="account_type_id">Jenis Akun <span class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="account_type_id" class="form-select" name="account_type_id" required>
                                        <option value="" {{ old('account_type_id') ? '' : 'selected' }}>-- Pilih
                                            --</option>
                                        @foreach ($accountTypes as $accountType)
                                            <option value="{{ $accountType->id }}"
                                                {{ old('account_type_id') == $accountType->id ? 'selected' : '' }}>
                                                {{ $accountType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Jenis Akun End -->

                        <!-- Faktur -->
                        <div class="col-md-4">
                            <div class="select-style-1">
                                <label for="faktur_id">Faktur <span class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="faktur_id" class="form-select" name="faktur_id" required>
                                        <option value="" {{ old('faktur_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @foreach ($fakturs as $faktur)
                                            <option value="{{ $faktur->id }}"
                                                {{ old('faktur_id') == $faktur->id ? 'selected' : '' }}>
                                                {{ $faktur->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Faktur End -->
                    </div>
                    {{-- Group Kategori, Jenis Akun & Faktur End --}}

                    <!-- Nama Perusahaan -->
                    <div class="input-style-2">
                        <label for="company_name" class="form-label">Nama Perusahaan <span
                                class="text-danger">*</span></label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                            class="form-control" placeholder="Nama Perusahaan" required />
                        @error('company_name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat Perusahaan -->
                    <div class="input-style-2">
                        <label for="office_address" class="form-label">Alamat Perusahaan <span
                                class="text-danger">*</span></label>
                        <textarea name="office_address" id="office_address" class="form-control" placeholder="Alamat Perusahaan" rows="3"
                            required>{{ old('office_address') }}</textarea>
                        @error('office_address')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi (Provinsi - Desa) -->
                    <div class="row g-3">
                        {{-- Provinsi --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="provinces_id" class="form-label">Provinsi <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="provinces_id" name="provinces_id" class="form-select" required>
                                        <option value="" {{ old('provinces_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                {{ old('provinces_id') == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Kabupaten --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="regency_id" class="form-label">Kabupaten <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="regency_id" name="regency_id" class="form-select" required>
                                        <option value="" {{ old('regency_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @if (old('regency_id') && isset($regencies))
                                            @foreach ($regencies as $regency)
                                                <option value="{{ $regency->id }}"
                                                    {{ old('regency_id') == $regency->id ? 'selected' : '' }}>
                                                    {{ $regency->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Kecamatan --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="district_id" class="form-label">Kecamatan <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="district_id" name="district_id" class="form-select" required>
                                        <option value="" {{ old('district_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @if (old('district_id') && isset($districts))
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Kel/Desa --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="village_id" class="form-label">Kelurahan/Desa <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="village_id" name="village_id" class="form-select" required>
                                        <option value="" {{ old('village_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @if (old('village_id') && isset($villages))
                                            @foreach ($villages as $village)
                                                <option value="{{ $village->id }}"
                                                    {{ old('village_id') == $village->id ? 'selected' : '' }}>
                                                    {{ $village->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi (Provinsi - Desa) End -->

                    <!-- Step 2 : Informasi Pemilik -->
                    <h6 class="mb-3"><i class="mdi mdi-account-tie"></i> Pemilik Perusahaan</h6>

                    {{-- Nama Pemilik --}}
                    <div class="input-style-2">
                        <label for="owner_name" class="form-label">Nama Pemilik <span
                                class="text-danger">*</span></label>
                        <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}"
                            class="form-control" placeholder="Nama Pemilik" required />
                        @error('owner_name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Nama Pemilik End --}}

                    {{-- Group Jenis Identitas, No Identitas, Telp & Email --}}
                    <div class="row g-3">
                        {{-- Jenis Identitas --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="identity_type_id" class="form-label">Jenis Identitas <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="identity_type_id" name="identity_type_id" class="form-select"
                                        required>
                                        <option value="" {{ old('identity_type_id') ? '' : 'selected' }}>--
                                            Pilih --</option>
                                        @foreach ($identityTypes as $identityType)
                                            <option value="{{ $identityType->id }}"
                                                {{ old('identity_type_id') == $identityType->id ? 'selected' : '' }}>
                                                {{ $identityType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Jenis Identitas End --}}


                        {{-- Nomor Identitas --}}
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="identity_number" class="form-label">Nomor Identitas <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="identity_number" id="identity_number"
                                    value="{{ old('identity_number') }}" class="form-control"
                                    placeholder="Nomor Identitas" required />
                                @error('identity_number')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- Nomor Identitas End --}}

                        {{-- Nomor Telp --}}
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="owner_mobile" class="form-label">Nomor Telp <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="owner_mobile" id="owner_mobile"
                                    value="{{ old('owner_mobile') }}" class="form-control" placeholder="Nomor Telp"
                                    required />
                                @error('owner_mobile')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- Nomor Telp End --}}

                        {{-- Nomor Email --}}
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="owner_email" class="form-label">Nomor Email <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="owner_email" id="owner_email"
                                    value="{{ old('owner_email') }}" class="form-control" placeholder="Nomor Email"
                                    required />
                                @error('owner_email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- Nomor Email End --}}

                    </div>
                    {{-- Group Jenis Identitas, No Identitas, Telp & Email End --}}

                    <!-- Step 3 : Informasi Pajak -->
                    <h6 class="mb-3"><i class="mdi mdi-file-percent-outline"></i> Informasi Pajak</h6>

                    {{-- Group NPWP & BANK --}}
                    <div class="row g-3">
                        {{-- NPWP --}}
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="npwp" class="form-label">NPWP <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="npwp" id="npwp" value="{{ old('npwp') }}"
                                    class="form-control" placeholder="NPWP" required />
                                @error('npwp')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- NPWP End --}}

                        {{-- BANK --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="bank_id" class="form-label">BANK <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="bank_id" name="bank_id" class="form-select" required>
                                        <option value="" {{ old('bank_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}"
                                                {{ old('bank_id') == $bank->id ? 'selected' : '' }}>
                                                {{ $bank->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- BANK End --}}
                    </div>
                    {{-- Group NPWP & BANK End --}}

                    <!-- Atas Nama -->
                    <div class="input-style-2">
                        <label for="bank_account_name" class="form-label">Atas Nama <span
                                class="text-danger">*</span></label>
                        <input type="text" name="bank_account_name" id="bank_account_name"
                            value="{{ old('bank_account_name') }}" class="form-control" placeholder="Atas Nama"
                            required />
                        @error('bank_account_name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat Faktur -->
                    <div class="input-style-2">
                        <label for="invoice_address" class="form-label">Alamat Faktur <span
                                class="text-danger">*</span></label>
                        <textarea name="invoice_address" id="invoice_address" class="form-control" placeholder="Alamat Faktur"
                            rows="3" required>{{ old('invoice_address') }}</textarea>
                        @error('invoice_address')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Step 4 : Kontak / PIC -->
                    <h6 class="mb-3"><i class="mdi mdi-badge-account-alert"></i> Kontak / Penanggung Jawab</h6>

                    <div class="row g-3">
                        {{-- Keuangan --}}
                        <div class="col-md-6">
                            <div class="input-style-3">
                                <label for="finance_name" class="form-label">Keuangan</label>
                                <div class="input-style-3 position-relative">
                                    <input type="text" name="finance_name" id="finance_name"
                                        value="{{ old('finance_name') }}" class="form-control ps-5"
                                        placeholder="Nama" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-user"></i>
                                    </span>
                                    @error('finance_name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="finance_mobile" id="finance_mobile"
                                        value="{{ old('finance_mobile') }}" class="form-control ps-5"
                                        placeholder="No. HP" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-phone"></i>
                                    </span>
                                    @error('finance_mobile')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="email" name="finance_email" id="finance_email"
                                        value="{{ old('finance_email') }}" class="form-control ps-5"
                                        placeholder="Email" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-envelope"></i>
                                    </span>
                                    @error('finance_email')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        {{-- Keuangan End --}}

                        {{-- Bisnis --}}
                        <div class="col-md-6">
                            <div class="input-style-3">
                                <label for="business_name" class="form-label">Bisnis</label>
                                <div class="input-style-3 position-relative">
                                    <input type="text" name="business_name" id="business_name"
                                        value="{{ old('business_name') }}" class="form-control ps-5"
                                        placeholder="Nama" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-user"></i>
                                    </span>
                                    @error('business_name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="business_mobile" id="business_mobile"
                                        value="{{ old('business_mobile') }}" class="form-control ps-5"
                                        placeholder="No. HP" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-phone"></i>
                                    </span>
                                    @error('business_mobile')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="email" name="business_email" id="business_email"
                                        value="{{ old('business_email') }}" class="form-control ps-5"
                                        placeholder="Email" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-envelope"></i>
                                    </span>
                                    @error('business_email')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        {{-- Bisnis End --}}
                    </div>


                    {{-- Group Keuangan, Bisnis, Customer Service & Teknis --}}
                    <div class="row g-3">
                        {{-- Customer Service --}}
                        <div class="col-md-6">
                            <div class="input-style-3">
                                <label for="cs_name" class="form-label">Customer Service<span
                                        class="text-danger">*</span></label>
                                <div class="input-style-3 position-relative">
                                    <input type="text" name="cs_name" id="cs_name"
                                        value="{{ old('cs_name') }}" class="form-control ps-5" placeholder="Nama"
                                        required />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-user"></i>
                                    </span>
                                    @error('cs_name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="cs_mobile" id="cs_mobile"
                                        value="{{ old('cs_mobile') }}" class="form-control ps-5"
                                        placeholder="No. WhatsApp" required />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-whatsapp"></i>
                                    </span>
                                    @error('cs_mobile')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="cs_tm" id="cs_tm" value="{{ old('cs_tm') }}"
                                        class="form-control ps-5" placeholder="Username Telegram " />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-telegram"></i>
                                    </span>
                                    @error('cs_tm')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="email" name="cs_email" id="cs_email"
                                        value="{{ old('cs_email') }}" class="form-control ps-5"
                                        placeholder="Email" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-envelope"></i>
                                    </span>
                                    @error('cs_email')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        {{-- Customer Service End --}}

                        {{-- Teknis --}}
                        <div class="col-md-6">
                            <div class="input-style-3">
                                <label for="tech_name" class="form-label">Teknis<span
                                        class="text-danger">*</span></label>
                                <div class="input-style-3 position-relative">
                                    <input type="text" name="tech_name" id="tech_name"
                                        value="{{ old('tech_name') }}" class="form-control ps-5" placeholder="Nama"
                                        required />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-user"></i>
                                    </span>
                                    @error('tech_name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="tech_mobile" id="tech_mobile"
                                        value="{{ old('tech_mobile') }}" class="form-control ps-5"
                                        placeholder="No. WhatsApp" required />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-whatsapp"></i>
                                    </span>
                                    @error('tech_mobile')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="tel" name="tech_tm" id="tech_tm"
                                        value="{{ old('tech_tm') }}" class="form-control ps-5"
                                        placeholder="Username Telegram" />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-telegram"></i>
                                    </span>
                                    @error('tech_tm')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-style-3 position-relative">
                                    <input type="email" name="tech_email" id="tech_email"
                                        value="{{ old('tech_email') }}" class="form-control ps-5"
                                        placeholder="Email" required />
                                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                        <i class="lni lni-envelope"></i>
                                    </span>
                                    @error('tech_email')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        {{-- Teknis End --}}
                    </div>
                    {{-- Group Keuangan, Bisnis, Customer Service & Teknis End --}}

                    <!-- Step 4 : System / Software -->
                    <h6 class="mb-3"><i class="mdi mdi-database-cog"></i> System / Software</h6>

                    {{-- Group Software & IP Addres --}}
                    <div class="row g-3">
                        {{-- Software --}}
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label for="software_id" class="form-label">Software <span
                                        class="text-danger">*</span></label>
                                <div class="select-position">
                                    <select id="software_id" name="software_id" class="form-select" required>
                                        <option value="" {{ old('software_id') ? '' : 'selected' }}>-- Pilih --
                                        </option>
                                        @foreach ($softwares as $software)
                                            <option value="{{ $software->id }}"
                                                {{ old('software_id') == $software->id ? 'selected' : '' }}>
                                                {{ $software->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Software End --}}


                        {{-- IP Address --}}
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="ip_address" class="form-label">IP Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="ip_address" id="ip_address"
                                    value="{{ old('ip_address') }}" class="form-control" placeholder="IP Address"
                                    required />
                                @error('ip_address')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- IP Address End --}}
                    </div>

                    {{-- Group Software & IP Addres End --}}

                    <!-- URL Callback / Report -->
                    <div class="input-style-2">
                        <label for="url_callback" class="form-label">URL Callback / Report <span
                                class="text-danger">*</span></label>
                        <input type="text" name="url_callback" id="url_callback"
                            value="{{ old('url_callback') }}" class="form-control"
                            placeholder="URL Callback / Report" required />
                        @error('url_callback')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Marketing --}}
                    <div class="select-style-1">
                        <label for="crm_id" class="form-label">Marketing <span class="text-danger">*</span></label>
                        <div class="select-position">
                            <select id="crm_id" name="crm_id" class="form-select" required>
                                <option value="" {{ old('crm_id') ? '' : 'selected' }}>-- Pilih --</option>
                                @foreach ($crms as $crm)
                                    <option value="{{ $crm->id }}"
                                        {{ old('crm_id') == $crm->id ? 'selected' : '' }}>
                                        {{ $crm->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Marketing End --}}



                    <!-- Catatan -->
                    <div class="input-style-2">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea name="note" id="note" class="form-control" placeholder="Masukan Catatan / Keterangan Apabila Ada."
                            rows="3">{{ old('note') }}</textarea>
                        @error('note')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>




                    <!-- Tombol -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="reset" class="btn btn-outline-danger">
                            <i class="mdi mdi-close-thick"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Card Body End --}}




    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Provinsi -> Kabupaten
            $('#provinces_id').on('change', function() {
                const provinces_id = $(this).val();

                $.post('{{ route('getRegency') }}', {
                    provinces_id
                }, function(response) {
                    $('#regency_id').html(response);
                    $('#district_id').html('<option value="">-- Pilih --</option>');
                    $('#village_id').html('<option value="">-- Pilih --</option>');
                }).fail(function() {
                    alert('Gagal memuat data kabupaten.');
                });
            });

            // Kabupaten -> Kecamatan
            $('#regency_id').on('change', function() {
                const regency_id = $(this).val();

                $.post('{{ route('getDistrict') }}', {
                    regency_id
                }, function(response) {
                    $('#district_id').html(response);
                    $('#village_id').html('<option value="">-- Pilih --</option>');
                }).fail(function() {
                    alert('Gagal memuat data kecamatan.');
                });
            });

            // Kecamatan -> Desa
            $('#district_id').on('change', function() {
                const district_id = $(this).val();

                $.post('{{ route('getVillage') }}', {
                    district_id
                }, function(response) {
                    $('#village_id').html(response);
                }).fail(function() {
                    alert('Gagal memuat data desa.');
                });
            });
        });
    </script>
</body>

</html>
