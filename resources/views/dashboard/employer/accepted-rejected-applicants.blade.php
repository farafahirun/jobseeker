@extends('dashboard.template')

@section('header')
    <h1 class="text-3xl font-bold text-gray-800">Applicants Overview</h1>
@endsection

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (!$employer)
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-red-800">Profile Incomplete</h3>
                        <p class="text-red-700">Please complete your profile before accessing this page.</p>
                    </div>
                </div>
            </div>
        @else
            @foreach ($jobPosts as $jobPost)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ $jobPost->title }}</h2>
                        
                        <!-- Accepted Applicants Section -->
                        <div class="mb-8">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <h3 class="text-xl font-bold text-gray-700">Accepted Applicants</h3>
                            </div>
                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($jobPost->jobAplications as $application)
                                            @if ($application->status === 'accepted')
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            <div class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded-full flex items-center justify-center">
                                                                <span class="text-xl text-gray-600">{{ substr($application->jobSeeker->full_name, 0, 1) }}</span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">{{ $application->jobSeeker->full_name }}</div>
                                                                <div class="text-sm text-gray-500">{{ $application->jobSeeker->user->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="text-sm text-gray-900">{{ $application->jobSeeker->date_of_birth }}</div>
                                                        <div class="text-sm text-gray-500">{{ ucfirst($application->jobSeeker->gender) }}</div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('employer.profile', $application->jobSeeker->id) }}" 
                                                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            View Profile
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ asset('storage/' . $application->cv) }}" target="_blank"
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            View CV
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Accepted
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Rejected Applicants Section -->
                        <div>
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <h3 class="text-xl font-bold text-gray-700">Rejected Applicants</h3>
                            </div>
                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <!-- Same table structure as above, but for rejected applicants -->
                                <table class="min-w-full divide-y divide-gray-200">
                                    <!-- ... Copy the same thead structure ... -->
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($jobPost->jobAplications as $application)
                                            @if ($application->status === 'rejected')
                                                <!-- ... Copy the same tr structure but change status styling ... -->
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <!-- ... Same structure as accepted applicants ... -->
                                                    <td class="px-6 py-4">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Rejected
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection