@extends('dashboard.template')

@section('header')
    <h1 class="text-3xl font-bold text-gray-800">Create New User Account</h1>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.store') }}" onsubmit="return confirm('Are you sure you want to create this user?');">
                        @csrf
                        <div class="space-y-6">
                            <div class="relative">
                                <label for="username" class="text-gray-700 font-semibold">Username</label>
                                <input id="username" 
                                    class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                    type="text" name="username" required autofocus placeholder="Enter username" />
                            </div>

                            <div class="relative">
                                <label for="email" class="text-gray-700 font-semibold">Email Address</label>
                                <input id="email" 
                                    class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                    type="email" name="email" required placeholder="user@example.com" />
                            </div>

                            <div class="relative">
                                <label for="password" class="text-gray-700 font-semibold">Password</label>
                                <input id="password" 
                                    class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                    type="password" name="password" required placeholder="Enter password" />
                            </div>

                            <div class="relative">
                                <label for="role" class="text-gray-700 font-semibold">User Role</label>
                                <select id="role" name="role" 
                                    class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                    required>
                                    <option value="" disabled selected>Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="employer">Employer</option>
                                    <option value="job_seeker">Job Seeker</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end pt-4">
                                <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 transform hover:scale-105">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection