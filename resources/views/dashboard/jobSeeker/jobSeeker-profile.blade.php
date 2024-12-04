@extends('dashboard.template')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-[#233f72] to-[#233f72] rounded-lg shadow-lg p-6 mb-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                            <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" 
                                alt="Profile Picture" 
                                class="w-32 h-32 rounded-full border-4 border-white shadow-lg">
                        @else
                            <div class="w-32 h-32 rounded-full border-4 border-white shadow-lg bg-white flex items-center justify-center">
                                <span class="text-4xl font-bold text-[#233f72]">
                                    {{ strtoupper(substr($jobSeeker->full_name ?? 'NA', 0, 2)) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="text-white">
                        <h1 class="text-3xl font-bold">{{ $jobSeeker->full_name ?? 'Complete Your Profile' }}</h1>
                        <p class="text-blue-100">{{ $jobSeeker->bio ?? 'Add a bio to tell employers about yourself' }}</p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                    <form action="{{ route('jobSeeker.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information Section -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Personal Information</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                                @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                                    <div class="mt-2 flex items-center">
                                        <input type="file" name="profile_picture" 
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0 file:text-sm file:font-semibold
                                            file:bg-blue-50 file:text-[#233f72] hover:file:bg-blue-100">
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" name="full_name" value="{{ $jobSeeker->full_name ?? '' }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                        {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ $jobSeeker->date_of_birth ?? '' }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]"
                                        {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                                    @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                                        <select name="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    @else
                                        <input type="text" value="{{ ucfirst($jobSeeker->gender ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" readonly>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input type="text" name="contact" value="{{ $jobSeeker->contact ?? '' }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                        {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" name="address" value="{{ $jobSeeker->address ?? '' }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                        {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea rows="4" name="bio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                        {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->bio ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information Section -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Professional Information</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Skills</label>
                                <textarea rows="4" name="skills" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                    {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->skills ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Education</label>
                                <textarea rows="4" name="education_history" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" 
                                    {{ (isset($jobSeeker) && $jobSeeker->full_name) ? 'readonly' : '' }}>{{ $jobSeeker->education_history ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Certificates</label>
                                @if(isset($jobSeeker) && $jobSeeker->certificates)
                                    <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" target="_blank" class="text-[#233f72] hover:underline">View Current Certificate</a>
                                @else
                                    <input type="file" name="certificates" class="mt-2">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-end">
                    @if(!isset($jobSeeker) || !$jobSeeker->full_name)
                        <button type="submit" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-[#233f72] 
                                   transition duration-200 ease-in-out transform hover:-translate-y-1">
                            Save Profile
                        </button>
                        </form>
                    @else
                        <a href="{{ route('jobSeeker.edit', $jobSeeker->id) }}" 
                            class="px-6 py-3 bg-[#233f72] text-white rounded-lg hover:bg-[#31518c] 
                                   transition duration-200 ease-in-out transform hover:-translate-y-1">
                            Edit Profile
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection