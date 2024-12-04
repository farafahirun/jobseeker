@extends('dashboard.template')

@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <div class="relative">
                    <!-- Header Banner -->
                    <div class="h-32 bg-gradient-to-r from-[#233f72] to-[#233f72]"></div>
                    
                    <!-- Company Logo & Job Title Section -->
                    <div class="px-8 py-6 -mt-16">
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $job->title }}</h1>
                                    <div class="mt-3 flex items-center">
                                        <span class="text-xl text-[#233f72] font-semibold">{{ $job->employer->company_name }}</span>
                                    </div>
                                </div>
                                @if ($cekFavorit)
                                    <form action="{{ route('jobseeker.favorite', $job->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="p-2 rounded-full hover:bg-red-50 text-red-500">
                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-6.828 6.828a.5.5 0 01-.707 0L3.172 10.828a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('jobseeker.favorite', $job->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="p-2 rounded-full hover:bg-gray-100 text-gray-400">
                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-6.828 6.828a.5.5 0 01-.707 0L3.172 10.828a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <!-- Job Meta Information -->
                            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span>{{ $job->location }}</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $job->job_type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details Content -->
                <div class="p-8 space-y-8">
                    <!-- Description Section -->
                    <div class="bg-white p-6 rounded-xl border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">About this role</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $job->description }}</p>
                    </div>

                    <!-- Requirements Section -->
                    <div class="bg-white p-6 rounded-xl border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Requirements</h3>
                        <ul class="space-y-3">
                            @foreach (explode("\n", $job->requirements) as $requirement)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-600">{{ $requirement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Job Details Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                            <h4 class="text-[#233f72] font-semibold mb-2">Salary</h4>
                            <p class="text-2xl font-bold text-[#233f72]">Rp {{ number_format($job->salary, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                            <h4 class="text-green-800 font-semibold mb-2">Payday</h4>
                            <p class="text-2xl font-bold text-green-700">{{ $job->payday }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                            <h4 class="text-[#233f72] font-semibold mb-2">Status</h4>
                            <p class="text-2xl font-bold text-purple-700">{{ $job->status }}</p>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-start pt-4">
                        <a href="{{ route('jobseeker.job.list') }}" 
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#233f72] to-[#233f72] text-white font-medium rounded-xl hover:from-[#233f72] hover:to-[#233f72] transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Job List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
