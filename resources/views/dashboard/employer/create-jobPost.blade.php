@extends('dashboard.template')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('jobPost.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employer_id" value="{{ Auth::user()->id }}">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="location" name="location" required>
            </div>

            <div class="mb-4">
                <label for="job_type" class="block text-sm font-medium text-gray-700 mb-1">Job Type</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="job_type" name="job_type" required>
                    <option value="default" selected disabled>{{ __('Select Jobs Type') }}</option>
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="freelance">Freelance</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="payday" class="block text-sm font-medium text-gray-700 mb-1">Payment Target</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="payday" name="payday" required>
                    <option value="default" selected disabled>{{ __('Select Payment Target') }}</option>
                    <option value="yearly">Yearly</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                    <option value="daily">Daily</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="description" name="description" required></textarea>
            </div>

            <div class="mb-4">
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">Requirements</label>
                <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="requirements" name="requirements" required></textarea>
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
                <input type="number" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#233f72] focus:ring-[#233f72]" id="salary" name="salary" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#233f72] text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection