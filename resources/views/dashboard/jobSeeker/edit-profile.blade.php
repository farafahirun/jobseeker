@extends('dashboard.template')

@section('content')
<div class="py-8 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
            <div class="p-8">
                <div class="border-b pb-6 mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Edit Your Profile</h2>
                    <p class="text-gray-600 mt-2">Update your information to stand out to employers</p>
                </div>

                <form action="{{ route('jobSeeker.update', $jobSeeker->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div>
                            <!-- Profile Picture Section -->
                            <div class="mb-8">
                                <label class="block text-lg font-semibold text-gray-800 mb-4">Profile Picture</label>
                                <div class="flex items-center space-x-6">
                                    @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                                        <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" 
                                             class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow-md"
                                             alt="Profile Picture">
                                    @else
                                        <div class="w-32 h-32 rounded-full bg-blue-50 flex items-center justify-center text-2xl font-bold text-[#233f72] border-4 border-blue-100 shadow-md">
                                            {{ strtoupper(substr($jobSeeker->full_name ?? 'NA', 0, 2)) }}
                                        </div>
                                    @endif
                                    <div class="flex flex-col">
                                        <label class="px-4 py-2 bg-[#233f72] text-white rounded-lg cursor-pointer hover:bg-[#345490] transition-colors">
                                            <input type="file" name="profile_picture" class="hidden">
                                            Upload New Photo
                                        </label>
                                        <span class="text-sm text-gray-500 mt-2">Recommended: 400x400px</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="space-y-6">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" name="full_name" value="{{ old('full_name', $jobSeeker->full_name ?? '') }}" 
                                           class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $jobSeeker->date_of_birth ?? '') }}" 
                                               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Gender</label>
                                        <select name="gender" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ old('gender', $jobSeeker->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender', $jobSeeker->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="text-sm font-medium text-gray-700">Contact Number</label>
                                <input type="text" name="contact" value="{{ old('contact', $jobSeeker->contact ?? '') }}" 
                                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" value="{{ old('address', $jobSeeker->address ?? '') }}" 
                                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-700">Professional Bio</label>
                                <textarea name="bio" rows="3" 
                                          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">{{ old('bio', $jobSeeker->bio ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Sections -->
                    <div class="mt-8 space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Skills</label>
                            <textarea name="skills" rows="3" 
                                      class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">{{ old('skills', $jobSeeker->skills ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Education History</label>
                            <textarea name="education_history" rows="3" 
                                      class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#233f72] focus:border-[#233f72]">{{ old('education_history', $jobSeeker->education_history ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Certificates</label>
                            <div class="mt-2 flex items-center space-x-4">
                                <label class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg cursor-pointer hover:bg-gray-200 transition-colors">
                                    <input type="file" name="certificates" class="hidden">
                                    Upload Certificate
                                </label>
                                @if(isset($jobSeeker) && $jobSeeker->certificates)
                                    <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" 
                                       target="_blank" 
                                       class="text-[#233f72] hover:text-[#35538c] flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        View Current Certificate
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 bg-[#233f72] text-white font-semibold rounded-lg hover:bg-[#345490] focus:ring-4 focus:ring-blue-200 transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
