@extends('dashboard.template')

@section('header')
    Edit Profil Perusahaan
@endsection

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('employer.update', $employer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-6">

                    <!-- Logo Perusahaan -->
                    <div>
                        <label for="profile_picture" class="block text-lg font-medium text-gray-700">Logo Perusahaan</label>
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $employer->profile_picture) }}" alt="Logo Perusahaan"
                                class="max-w-xs mx-auto rounded-lg shadow-md">
                        </div>
                        <input type="file" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="profile_picture"
                            name="profile_picture">
                    </div>
                    <!-- Nama Perusahaan -->
                    <div>
                        <label for="company_name" class="block text-lg font-medium text-gray-700">Nama Perusahaan</label>
                        <input type="text" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="company_name"
                            name="company_name" value="{{ old('company_name', $employer->company_name ?? '') }}" required>
                    </div>

                    <!-- Deskripsi Perusahaan -->
                    <div>
                        <label for="company_description" class="block text-lg font-medium text-gray-700">Deskripsi
                            Perusahaan</label>
                        <textarea class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="company_description" name="company_description"
                            rows="4">{{ old('company_description', $employer->company_description ?? '') }}</textarea>
                    </div>

                    <!-- Industri -->
                    <div>
                        <label for="industry" class="block text-lg font-medium text-gray-700">Industri</label>
                        <input type="text" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="industry"
                            name="industry" value="{{ old('industry', $employer->industry ?? '') }}">
                    </div>

                    <!-- Website -->
                    <div>
                        <label for="website" class="block text-lg font-medium text-gray-700">Website</label>
                        <input type="url" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="website"
                            name="website" value="{{ old('website', $employer->website ?? '') }}">
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="contact" class="block text-lg font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="contact"
                            name="contact" value="{{ old('contact', $employer->contact ?? '') }}">
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="address" class="block text-lg font-medium text-gray-700">Alamat</label>
                        <textarea class="mt-2 p-3 border border-gray-300 rounded-lg w-full" id="address" name="address" rows="3">{{ old('address', $employer->address ?? '') }}</textarea>
                    </div>

                    <!-- Simpan Perubahan -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-[#233f72] text-white py-3 rounded-lg hover:bg-[#45639c] transition duration-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
