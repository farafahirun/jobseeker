@extends('dashboard.template')

@section('header')
    <h1 class="text-3xl font-bold text-gray-800">Edit Job Position</h1>
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-8">
            <form action="{{ route('jobPost.update', $selectedEmployer->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <label for="title" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-briefcase mr-2"></i>Job Title
                        </label>
                        <input type="text" name="title" id="title" value="{{ $selectedEmployer->title }}" 
                            class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-map-marker-alt mr-2"></i>Location
                            </label>
                            <input type="text" name="location" id="location" value="{{ $selectedEmployer->location }}" 
                                class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                        </div>

                        <div>
                            <label for="job_type" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-clock mr-2"></i>Employment Type
                            </label>
                            <select name="job_type" id="job_type" 
                                class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                                <option value="full-time" {{ $selectedEmployer->job_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ $selectedEmployer->job_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="freelance" {{ $selectedEmployer->job_type == 'freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="salary" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-money-bill-wave mr-2"></i>Salary Amount
                            </label>
                            <div class="mt-1 flex rounded-lg border-gray-200 focus-within:border-[#233f72] focus-within:ring focus-within:ring-blue-200 transition duration-200">
                                <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-200 bg-gray-50 text-gray-500 text-sm">Rp</span>
                                <input type="number" name="salary" id="salary" value="{{ $selectedEmployer->salary }}" 
                                    class="block w-full px-4 py-3 rounded-r-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                            </div>
                        </div>

                        <div>
                            <label for="payday" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-calendar-alt mr-2"></i>Payment Schedule
                            </label>
                            <select name="payday" id="payday" 
                                class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                                <option value="yearly" {{ $selectedEmployer->payday == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                <option value="monthly" {{ $selectedEmployer->payday == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="weekly" {{ $selectedEmployer->payday == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="daily" {{ $selectedEmployer->payday == 'daily' ? 'selected' : '' }}>Daily</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-align-left mr-2"></i>Job Description
                        </label>
                        <textarea name="description" id="description" rows="4" 
                            class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">{{ $selectedEmployer->description }}</textarea>
                    </div>

                    <div>
                        <label for="requirements" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-list-ul mr-2"></i>Requirements
                        </label>
                        <textarea name="requirements" id="requirements" rows="4" 
                            class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">{{ $selectedEmployer->requirements }}</textarea>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-toggle-on mr-2"></i>Job Status
                        </label>
                        <select name="status" id="status" 
                            class="mt-1 block w-full px-4 py-3 rounded-lg border-gray-200 focus:border-[#233f72] focus:ring focus:ring-blue-200 transition duration-200">
                            <option value="active" {{ $selectedEmployer->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="closed" {{ $selectedEmployer->status == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ url()->previous() }}" 
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="px-6 py-3 bg-[#233f72] text-white rounded-lg hover:bg-[#375896] focus:outline-none focus:ring-2 focus:ring-[#233f72] focus:ring-offset-2 transition duration-200">
                        Update Job Position
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
