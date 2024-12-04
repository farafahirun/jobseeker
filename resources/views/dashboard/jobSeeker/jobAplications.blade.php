@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 font-poppins mb-8">Job Applications Status</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 transform hover:scale-105 transition-all duration-300">
                    <p class="text-sm text-gray-600 font-inter">Accepted Applications</p>
                    <p class="text-3xl font-bold text-gray-900 font-poppins mt-2">{{ $applications->where('status', 'accepted')->count() }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500 transform hover:scale-105 transition-all duration-300">
                    <p class="text-sm text-gray-600 font-inter">In Progress</p>
                    <p class="text-3xl font-bold text-gray-900 font-poppins mt-2">{{ $applications->where('status', 'pending')->count() }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-red-500 transform hover:scale-105 transition-all duration-300">
                    <p class="text-sm text-gray-600 font-inter">Rejected Applications</p>
                    <p class="text-3xl font-bold text-gray-900 font-poppins mt-2">{{ $applications->where('status', 'rejected')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Applications Sections -->
        @foreach(['accepted' => 'Accepted', 'pending' => 'In Progress', 'rejected' => 'Rejected'] as $status => $label)
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 font-poppins">{{ $label }} Applications</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($applications->where('status', $status) as $application)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-xl text-gray-900 font-poppins">{{ $application->jobPost->title }}</h3>
                                    <span class="px-4 py-1.5 rounded-full text-sm font-medium font-inter
                                        {{ $status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ $label }}
                                    </span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-600 font-inter">
                                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $application->jobPost->location }}
                                    </div>
                                    <div class="flex items-center text-gray-600 font-inter">
                                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $application->jobPost->job_type }}
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <a href="{{ route('jobseeker.job.details', $application->job_post_id) }}" 
                                       class="text-[#3d5f9e] hover:text-[#233f72] font-semibold text-sm inline-flex items-center group">
                                        View Details
                                        <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($applications->where('status', $status)->isEmpty())
                    <div class="bg-gray-50 rounded-xl p-8 text-center">
                        <p class="text-gray-500 font-inter">No {{ strtolower($label) }} applications</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
