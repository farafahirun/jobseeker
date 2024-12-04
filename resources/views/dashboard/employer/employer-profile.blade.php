@extends('dashboard.template')

@section('header')
    Profil Perusahaan
@endsection

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                @if (isset($employer) && $employer->id)
                    <div class="space-y-6">
                        <!-- Logo Perusahaan -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Logo Perusahaan</label>
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $employer->profile_picture) }}" alt="Logo Perusahaan"
                                    class="max-w-xs mx-auto rounded-lg shadow-md">
                            </div>
                        </div>
                        <!-- Nama Perusahaan -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Nama Perusahaan</label>
                            <p class="text-gray-600 mt-1">{{ $employer->company_name }}</p>
                        </div>

                        <!-- Deskripsi Perusahaan -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Deskripsi Perusahaan</label>
                            <p class="text-gray-600 mt-1">{{ $employer->company_description }}</p>
                        </div>

                        <!-- Industri -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Industri</label>
                            <p class="text-gray-600 mt-1">{{ $employer->industry }}</p>
                        </div>

                        <!-- Website -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Website</label>
                            <p class="text-gray-600 mt-1">{{ $employer->website }}</p>
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Nomor Telepon</label>
                            <p class="text-gray-600 mt-1">{{ $employer->contact }}</p>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label class="text-lg font-semibold text-gray-800">Alamat</label>
                            <p class="text-gray-600 mt-1">{{ $employer->address }}</p>
                        </div>

                        <!-- Edit Profil Button -->
                        <div class="mt-4 text-center">
                            <a href="{{ route('employer.edit', $employer->id) }}"
                                class="inline-block bg-[#233f72] text-white px-6 py-2 rounded-lg hover:bg-[#3d5d98] w-full">
                                Edit Profil
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Form untuk Menyimpan Profil Perusahaan -->
                    <form action="{{ route('employer.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Nama Perusahaan -->
                        <div>
                            <label for="company_name" class="block text-lg font-semibold text-gray-800">Nama
                                Perusahaan</label>
                            <input type="text" id="company_name" name="company_name"
                                class="mt-1 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('company_name') }}"
                                required>
                        </div>

                        <!-- Deskripsi Perusahaan -->
                        <div>
                            <label for="company_description" class="block text-lg font-semibold text-gray-800">Deskripsi
                                Perusahaan</label>
                            <textarea id="company_description" name="company_description" class="mt-1 p-3 border border-gray-300 rounded-lg w-full"
                                rows="4">{{ old('company_description') }}</textarea>
                        </div>

                        <!-- Industri -->
                        <div>
                            <label for="industry" class="block text-lg font-semibold text-gray-800">Industri</label>
                            <input type="text" id="industry" name="industry"
                                class="mt-1 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('industry') }}">
                        </div>

                        <!-- Website -->
                        <div>
                            <label for="website" class="block text-lg font-semibold text-gray-800">Website</label>
                            <input type="url" id="website" name="website"
                                class="mt-1 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('website') }}">
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label for="contact" class="block text-lg font-semibold text-gray-800">Nomor Telepon</label>
                            <input type="tel" id="contact" name="contact"
                                class="mt-1 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('contact') }}">
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="address" class="block text-lg font-semibold text-gray-800">Alamat</label>
                            <textarea id="address" name="address" class="mt-1 p-3 border border-gray-300 rounded-lg w-full" rows="3">{{ old('address') }}</textarea>
                        </div>

                        <!-- Logo Perusahaan -->
                        <div>
                            <label for="profile_picture" class="block text-lg font-semibold text-gray-800">Logo
                                Perusahaan</label>
                            <input type="file" id="profile_picture" name="profile_picture"
                                class="mt-1 p-3 border border-gray-300 rounded-lg w-full">
                        </div>

                        <!-- Simpan Button -->
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full bg-[#233f72] text-white py-3 rounded-lg hover:bg-[#45639c] transition duration-200">
                                Simpan
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
