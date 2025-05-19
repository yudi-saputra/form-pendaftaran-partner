<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pendaftaran Partner</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Geist"', "ui-sans-serif", "system-ui", "sans-serif"],
                    },
                },
            },
        };
    </script>

    <!-- Theme Preference -->
    <script>
        // Atur preferensi awal jika belum ada
        if (
            localStorage.getItem("theme") === null &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
            localStorage.setItem("theme", "dark");
        }

        // Apply theme saat load
        if (localStorage.getItem("theme") === "dark") {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }

        function toggleDarkMode() {
            const isDark = document.documentElement.classList.toggle("dark");
            localStorage.setItem("theme", isDark ? "dark" : "light");
            updateDarkIcon(isDark);
        }

        function updateDarkIcon(isDark) {
            const iconContainer = document.getElementById("darkIcon");
            iconContainer.innerHTML = isDark ?
                `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-zinc-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1m13.435-6.364l.707.707M4.343 19.657l.707.707m13.435 0l-.707-.707M4.343 4.343l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z" />
            </svg>` :
                `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-zinc-900 dark:text-zinc-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
            </svg>`;
        }

        document.addEventListener("DOMContentLoaded", () => {
            updateDarkIcon(document.documentElement.classList.contains("dark"));
        });
    </script>
</head>

<body
    class="transition-colors duration-300 font-sans bg-zinc-50 dark:bg-zinc-950 min-h-screen flex items-center justify-center p-4 text-zinc-900 dark:text-zinc-100">

    <div class="absolute top-4 inset-x-0 flex justify-center px-4 z-50">
        @include('message')
    </div>

    <div class="absolute top-4 right-4 z-50">
        <button onclick="toggleDarkMode()"
            class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-300 dark:hover:bg-zinc-600 transition">
            <span id="darkIcon"></span>
        </button>
    </div>


    {{-- Card Body --}}
    <div
        class="bg-white border border-zinc-100 dark:bg-zinc-900 dark:border-zinc-800 p-12 rounded-xl shadow-sm max-w-4xl w-full">
        <h1
            class="font-sans text-2xl font-bold leading-tight tracking-tighter sm:text-3xl md:text-4xl lg:leading-[1.1] text-center">
            Form Pendaftaran Partner
        </h1>
        <div class="border-b border-zinc-300 dark:border-zinc-800 mb-6 mt-2"></div>

        <form method="post" action="{{ route('partner.store') }}" class="space-y-6">
            @csrf

            <!-- STEP 1 -->
            <fieldset>
                <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    <span>Company General Information</span>
                </legend>

                <div class="flex flex-col mt-4 md:flex-row gap-4">
                    <!-- Partner Category -->
                    <label for="partner_category_id" class="flex-1">
                        <span class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2">
                            Partner Category:</span>
                        <select id="partner_category_id" name="partner_category_id" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">
                            <option value="">-- Pilih --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('partner_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('partner_category_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                    <!-- Account Type -->
                    <label for="account_type_id" class="flex-1">
                        <span class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2">
                            Account Type:</span>
                        <select id="account_type_id" name="account_type_id" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">
                            <option value="">-- Pilih --</option>
                            @foreach ($accountTypes as $accountType)
                                <option value="{{ $accountType->id }}"
                                    {{ old('account_type_id') == $category->id ? 'selected' : '' }}>
                                    {{ $accountType->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('account_type_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>


                <label class="font-sans block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Company Name/Nama Perusahaan:
                    <input type="text" name="company_name" value="{{ old('company_name') }}" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('company_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Office Address:
                    <textarea name="office_address" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">{{ old('office_address') }}</textarea>
                    @error('office_address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Invoice Address:
                    <textarea name="invoice_address" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">{{ old('invoice_address') }}</textarea>
                    @error('invoice_address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex flex-col md:flex-row gap-8">
                    <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                        City:
                        <input type="text" name="city" value="{{ old('city') }}" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                        @error('city')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                        Zip Code:
                        <input type="number" name="zip_code" value="{{ old('zip_code') }}" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                        @error('zip_code')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                        Province:
                        <input type="text" name="province" value="{{ old('province') }}" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                        @error('province')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                        Country:
                        <input type="text" name="country" value="{{ old('country') }}" required
                            class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                        @error('country')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Faktur / Non-Faktur:
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center space-x-2">
                            @foreach ($fakturs as $faktur)
                                <input type="radio" name="faktur_id" value="{{ $faktur->id }}" required
                                    class="text-blue-600 focus:ring-blue-500 border-zinc-300 dark:border-zinc-800 dark:bg-zinc-800 dark:checked:bg-blue-600">
                                     {{ old('faktur_id') == $faktur->id ? 'checked' : '' }}
                                <span class="text-zinc-700 dark:text-zinc-200">{{ $faktur->name }}</span>
                            @endforeach
                        </label>
                        @error('faktur_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </label>
            </fieldset>
            <div class="border border-zinc-300 dark:border-zinc-800"></div>

            <!-- STEP 2 -->
            <fieldset>
                <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span>Owner/Director/CEO Name</span>
                </legend>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Name:
                    <input type="text" name="owner_name" value="{{ old('owner_name') }}" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('owner_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Identity Type:
                    <select name="identity_type_id" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">
                        <option value="">-- Pilih --</option>
                        @foreach ($identityTypes as $identity)
                            <option value="{{ $identity->id }}"
                                {{ old('identity_type_id') == $identity->id ? 'selected' : '' }}>{{ $identity->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('identity_type_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Identity Number:
                    <input type="text" name="identity_number" value="{{ old('identity_number') }}" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('identity_number')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Mobile:
                    <input type="tel" name="owner_mobile" value="{{ old('owner_mobile') }}" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('owner_mobile')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Email:
                    <input type="email" name="owner_email" value="{{ old('owner_email') }}" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('owner_email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>
            </fieldset>
            <div class="border border-zinc-300 dark:border-zinc-800"></div>

            <!-- STEP 3 -->
            <fieldset>
                <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <span>
                        Corporate Financial / Tax Info
                    </span>
                </legend>

                <label for="npwp" class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    No. NPWP:
                    <input type="text" id="npwp" name="npwp" value="{{ old('npwp') }}"
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('npwp')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Bank for Transfer:
                    <input type="text" name="bank_transfer" value="{{ old('bank_transfer') }}"
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('bank_transfer')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Bank Account Name:
                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name') }}"
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('bank_account_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>
            </fieldset>
            <div class="border border-zinc-300 dark:border-zinc-800"></div>

            <!-- STEP 4 -->
            <fieldset>
                <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <span>Contact / PIC Partner Info</span>
                </legend>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Finance Section -->
                    <div>
                        <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Finance</span>
                        </legend>

                        <label for="finance_name"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Name:
                            <input type="text" id="finance_name" name="finance_name"
                                value="{{ old('finance_name') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('finance_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="finance_mobile"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Mobile:
                            <input type="tel" id="finance_mobile" name="finance_mobile"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('finance_mobile')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="finance_email"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Email:
                            <input type="email" id="finance_email" name="finance_email"
                                value="{{ old('finance_email') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('finance_email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <!-- Business / Commercial Section -->
                    <div>
                        <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Business / Commercial</span>
                        </legend>

                        <label for="business_name"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Name:
                            <input type="text" id="business_name" name="business_name"
                                value="{{ old('business_name') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('business_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="business_mobile"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Mobile:
                            <input type="tel" id="business_mobile"name="business_mobile"
                                value="{{ old('business_mobile') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('business_mobile')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="business_email"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Email:
                            <input type="email" id="business_email"name="business_email"
                                value="{{ old('business_email') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('business_email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Customer Service Section -->
                    <div>
                        <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Customer Service</span>
                        </legend>

                        <label for="cs_name"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Name:
                            <input type="text" id="cs_name" name="cs_name" required
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                        </label>

                        <label for="cs_mobile"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Mobile:
                            <input type="tel" id="cs_mobile"name="cs_mobile" value="{{ old('cs_mobile') }}"
                                required
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('cs_mobile')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="cs_tm"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Telegram:
                            <input type="tel" id="cs_tm"name="cs_tm" value="{{ old('cs_tm') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('cs_tm')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="cs_email"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Email:
                            <input type="email" id="cs_email"name="cs_email" value="{{ old('cs_email') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('cs_email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <!-- Technical Section -->
                    <div>
                        <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Technical</span>
                        </legend>

                        <label for="tech_name"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Name:
                            <input type="text" id="tech_name" name="tech_name" value="{{ old('tech_name') }}"
                                required
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('tech_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="tech_mobile"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Mobile:
                            <input type="tel" id="tech_mobile"name="tech_mobile"
                                value="{{ old('tech_mobile') }}" required
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('tech_mobile')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="tech_tm"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Telegram
                            <input type="tel" id="tech_tm"name="tech_tm" value="{{ old('tech_tm') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('tech_tm')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label for="tech_email"
                            class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Email:
                            <input type="email" id="tech_email"name="tech_email" value="{{ old('tech_email') }}"
                                class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                            @error('tech_email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="border border-zinc-300 dark:border-zinc-800 mt-4"></div>


                <legend class="font-sans mb-2 mt-4 text-base font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                    </svg>
                    <span>Technical Info</span>
                </legend>


                <label for="software_id" class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    Type Software/System:
                    <select id="software_id" name="software_id" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">
                        <option value="">-- Pilih --</option>
                        @foreach ($softwares as $software)
                            <option value="{{ $software->id }}"
                                {{ old('software_id') == $software->id ? 'selected' : '' }}>{{ $software->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('software_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label for="ip_address" class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">IP
                    Address:
                    <input type="text" id="ip_address" name="ip_address" value="{{ old('ip_address') }}"
                        required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('ip_address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>

                <label for="url_callback" class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">
                    URL Callback:
                    <input type="text" id="url_callback" name="url_callback" value="{{ old('url_callback') }}"
                        required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none" />
                    @error('url_callback')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>


                <label for="crm_id"
                    class="block text-sm font-sm text-zinc-700 dark:text-zinc-200 mb-2 mt-4">Reference:
                    <select name="crm_id" required
                        class="mt-2 block w-full border border-zinc-300 rounded-lg p-2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white focus:border-zinc-600 focus:outline-none">
                        <option value="">-- Pilih --</option>
                        @foreach ($crms as $crm)
                            <option value="{{ $crm->id }}" {{ old('crm_id') == $crm->id ? 'selected' : '' }}>
                                {{ $crm->name }}</option>
                        @endforeach
                    </select>
                    @error('crm_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </label>
            </fieldset>

            <div class="flex justify-end gap-4 mt-8">
                <button type="reset"
                    class="inline-flex items-center gap-2 text-sm font-medium px-4 py-2
                    border border-zinc-300 bg-zinc-100 text-zinc-900 rounded-lg
                    hover:bg-zinc-200 transition
                    dark:border-zinc-600 dark:bg-zinc-900 dark:text-white dark:hover:bg-zinc-800"
                    <!-- Heroicon: X Mark -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reset
                </button>

                <button type="submit"
                    class="inline-flex items-center gap-2 text-sm font-medium px-4 py-2
                    border border-zinc-300 bg-zinc-900 text-zinc-100 rounded-lg hover:bg-zinc-800 transition
                    dark:border-zinc-600 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-zinc-200 transition">
                    <!-- Heroicon: Paper Airplane -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Submit
                </button>


            </div>
        </form>
    </div>

</body>

</html>
