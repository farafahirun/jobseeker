@extends('dashboard.template')

@section('content')
<div class="py-8 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Manage Employers</h2>
            <div class="flex gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <span class="block text-sm text-gray-500">Total Employers</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $employers->count() }}</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <span class="block text-sm text-gray-500">Active Companies</span>
                    <span class="text-2xl font-bold text-green-600">{{ $employers->where('status', 'active')->count() }}</span>
                </div>
            </div>
        </div>

        <!-- Employers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($employers as $employer)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-gray-600">{{ substr($employer->company_name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $employer->company_name }}</h3>
                                <p class="text-sm text-gray-500">{{ $employer->email }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs rounded-full {{ $employer->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($employer->status ?? 'pending') }}
                        </span>
                    </div>
                    
                    <div class="flex flex-col space-y-2">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Posted Jobs: {{ $employer->jobs_count ?? 0 }}
                        </div>
                        
                        <div class="flex items-center space-x-2 mt-4">
                            <a href="{{ route('admin.employer.jobs', $employer->id) }}" 
                                class="flex-1 bg-blue-500 text-white text-center px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                                View Jobs
                            </a>
                            <button class="p-2 text-gray-500 hover:text-blue-500 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
