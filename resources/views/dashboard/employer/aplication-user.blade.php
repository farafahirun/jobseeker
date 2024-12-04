@extends('dashboard.template')

@section('content')
    <div class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('jobPost') }}"
                class="inline-flex items-center px-4 py-2 bg-[#233f72] text-white rounded-md hover:bg-[#3a5d9e] transition-colors duration-200 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Job Listings
            </a>

            @if ($jobPost)
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $jobPost->title }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-[#233f72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500">Company</p>
                                <p class="font-semibold text-gray-800">{{ $jobPost->employer->company_name }}</p>
                            </div>
                        </div>
                        <p><strong>Location:</strong> {{ $jobPost->location }}</p>
                        <p><strong>Job Type:</strong> {{ $jobPost->job_type }}</p>
                        <p><strong>Salary:</strong> {{ $jobPost->salary }}</p>
                        <p><strong>Experience Required:</strong> {{ $jobPost->experience }}</p>
                        <p><strong>Posted Date:</strong> {{ $jobPost->created_at->format('d M Y') }}</p>
                        <div class="col-span-2">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Job Description</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $jobPost->description }}</p>
                        </div>

                        <div class="col-span-2">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Requirements</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $jobPost->requirements }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-[#233f72]">Pending Applications</h3>
                    <span class="bg-indigo-100 text-[#233f72] text-sm font-medium px-4 py-2 rounded-full">
                        {{ $jobPost->jobAplications->where('status', 'pending')->count() }} Applicants
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach ($jobPost->jobAplications as $applicant)
                        @if ($applicant->status == 'pending')
                            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-14 h-14 bg-gradient-to-r from-indigo-500 to-[#233f72] rounded-xl flex items-center justify-center">
                                                <span class="text-xl font-bold text-white">{{ substr($applicant->jobSeeker->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-800">{{ $applicant->jobSeeker->name }}</h3>
                                                <p class="text-gray-500 text-sm">{{ $applicant->jobSeeker->email }}</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm bg-indigo-50 text-[#233f72] rounded-full">
                                            Applied {{ $applicant->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <div class="mb-6">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Cover Letter</h4>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <p class="text-gray-600 text-sm leading-relaxed">{{ $applicant->cover_letter }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-3">
                                        <a href="{{ asset('storage/' . $applicant->cv) }}" target="_blank"
                                            class="inline-flex items-center px-4 py-2 bg-white border border-indigo-500 text-indigo-500 rounded-lg hover:bg-indigo-50 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            View CV
                                        </a>
                                        <a href="{{ route('employer.profile', $applicant->jobSeeker->id) }}" target="_blank"
                                            class="inline-flex items-center px-4 py-2 bg-white border border-[#233f72] text-[#233f72] rounded-lg hover:bg-purple-50 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            View Profile
                                        </a>
                                    </div>

                                    <div class="mt-4 pt-4 border-t border-gray-100 flex gap-3">
                                        <form action="{{ route('employer.acceptApplicant', $applicant->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit"
                                                class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-200 font-medium">
                                                Accept Application
                                            </button>
                                        </form>
                                        <form action="{{ route('employer.rejectApplicant', $applicant->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit"
                                                class="w-full bg-white border border-red-500 text-red-500 px-4 py-2 rounded-lg hover:bg-red-50 transition-all duration-200 font-medium">
                                                Decline
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Job post not found</h2>
                    <p class="text-gray-600">The job posting you're looking for doesn't exist or has been removed.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
