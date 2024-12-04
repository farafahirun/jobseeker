@extends('dashboard.template')

@section('content')
<div class="bg-gradient-to-r from-[#233f72] to-[#233f72] text-white py-12 mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4">Find Your Dream Job</h1>
        <p class="text-xl">Discover opportunities that match your skills and aspirations</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <form method="GET" action="{{ route('jobseeker.job.list') }}" class="mb-8 bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative">
                <input type="text" name="search" placeholder="Search jobs..." 
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#233f72] focus:ring-2 focus:ring-blue-200 transition-all" 
                    value="{{ request('search') }}">
                <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <select name="location" class="w-full py-3 rounded-lg border border-gray-200 focus:border-[#233f72] focus:ring-2 focus:ring-blue-200 transition-all">
                <option value="">All Locations</option>
                @foreach ($locations as $location)
                    <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>{{ $location }}</option>
                @endforeach
            </select>

            <select name="job_type" class="w-full py-3 rounded-lg border border-gray-200 focus:border-[#233f72] focus:ring-2 focus:ring-blue-200 transition-all">
                <option value="">All Job Types</option>
                @foreach ($jobTypes as $jobType)
                    <option value="{{ $jobType }}" {{ request('job_type') == $jobType ? 'selected' : '' }}>{{ $jobType }}</option>
                @endforeach
            </select>

            <button type="submit" class="w-full bg-[#233f72] text-white py-3 rounded-lg hover:bg-[#233f72] transition-colors duration-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <span>Filter Jobs</span>
            </button>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach ($jobs as $job)
        @if ($job->status !== 'closed' && !$appliedJobs->contains($job->id))
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $job->title }}</h3>
                    <span class="px-3 py-1 bg-blue-100 text-[#233f72] text-sm rounded-full">{{ $job->job_type }}</span>
                </div>
                
                <div class="mb-4">
                    <p class="text-gray-600 font-medium mb-2">{{ $job->employer->company_name }}</p>
                    <div class="flex items-center text-gray-500 mb-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>{{ $job->location }}</span>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('jobseeker.job.details', $job->id) }}" 
                        class="flex-1 bg-[#233f72] text-white px-4 py-2 rounded-lg hover:bg-[#233f72] transition-colors duration-200 text-center">
                        View Details
                    </a>
                    <button onclick="document.getElementById('applyForm{{ $job->id }}').classList.toggle('hidden')"
                        class="bg-[#2d8338] text-white px-4 py-2 rounded-lg hover:bg-[#43c755] transition-colors duration-200">
                        Apply Now
                    </button>
                </div>

                <form id="applyForm{{ $job->id }}" action="{{ route('jobseeker.apply', $job->id) }}" 
                    method="POST" enctype="multipart/form-data" 
                    class="hidden mt-4 p-4 bg-gray-50 rounded-lg" 
                    onsubmit="return validateForm(this)">
                    @csrf
                    <div class="mb-4">
                        <label for="cv" class="block text-sm font-medium text-gray-700 mb-2">Upload CV (Required)</label>
                        <input type="file" name="cv" id="cv" 
                            class="w-full border border-gray-300 rounded-lg p-2" 
                            onchange="handleFileSelect(this)">
                        <p class="text-red-500 text-sm hidden mt-1" id="cvError">Please upload your CV first</p>
                    </div>
                    <button type="submit" 
                        class="w-full bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed transition-all duration-200" 
                        id="submitBtn" disabled>
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    {{ $jobs->links() }}

    <div class="bg-gradient-to-r from-[#233f72] to-blue-900 rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-bold mb-6 text-white flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Applied Jobs
            <span class="ml-3 text-sm bg-blue-100 text-[#233f72] px-3 py-1 rounded-full">
                {{ $appliedJobs->count() }} Applications
            </span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
            @if ($appliedJobs->contains($job->id))
            <div class="bg-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-all duration-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $job->title }}</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Applied
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-[#233f72] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <p class="text-gray-700 font-medium">{{ $job->employer->company_name }}</p>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-[#233f72] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $job->location }}</span>
                        </div>
                    </div>

                    <a href="{{ route('jobseeker.job.details', $job->id) }}" 
                        class="group inline-block w-full bg-gradient-to-r from-[#233f72] to-[#233f72] text-white px-4 py-2 rounded-lg hover:from-[#233f72] hover:to-[#233f72] transition-all duration-200 text-center">
                        View Application
                        <svg class="w-4 h-4 inline-block ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>

<script>
function handleFileSelect(input) {
    const submitBtn = input.closest('form').querySelector('#submitBtn');
    const cvError = input.closest('form').querySelector('#cvError');
    
    if (input.files.length > 0) {
        submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
        submitBtn.classList.add('bg-green-500', 'hover:bg-green-600');
        submitBtn.disabled = false;
        cvError.classList.add('hidden');
    } else {
        submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
        submitBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
        submitBtn.disabled = true;
    }
}

function validateForm(form) {
    const fileInput = form.querySelector('input[type="file"]');
    const cvError = form.querySelector('#cvError');
    
    if (!fileInput.files.length) {
        cvError.classList.remove('hidden');
        return false;
    }
    return true;
}
</script>
@endsection