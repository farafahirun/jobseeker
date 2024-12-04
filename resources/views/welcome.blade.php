<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobIn</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50">
    <!-- Mobile Menu -->
    <div x-data="{ isOpen: false, dropdownOpen: false }" class="md:hidden">
        <button @click="isOpen = !isOpen" class="fixed top-4 right-4 z-50">
            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div x-show="isOpen" class="fixed inset-0 z-40 bg-white p-4">
            <div class="flex flex-col space-y-4">
                <a href="#" class="text-gray-700 hover:text-[#233f72]">Home</a>
                <a href="#jobCategories" class="text-gray-700 hover:text-[#233f72]">Popular</a>
                <a href="#latestJobs" class="text-gray-700 hover:text-[#233f72]">Listings</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-[#0b1425]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#233f72]">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#233f72] text-white px-4 py-2 rounded-md">Register</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-4xl font-bold text-[#233f72] mb-2 tracking-tight">
                        <i class="fas fa-briefcase mr-3 custom-icon-color"></i>JobIn
                    </h1>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-gray-700 hover:text-[#233f72] px-3">Home</a>
                    <a href="#jobCategories" class="text-gray-700 hover:text-[#233f72] px-3">Popular</a>
                    <a href="#latestJobs" class="text-gray-700 hover:text-[#233f72] px-3">Listings</a>
                    @if (Route::has('login'))
                        <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-[#233f72]">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#233f72]">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="bg-[#233f72] text-white px-4 py-2 rounded-md hover:bg-[#233f72]">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Hero Section with Image -->
    <br><br>
    <div class="relative bg-[#0b1425] overflow-hidden pt-16">
        <img alt="A diverse group of professionals in an office setting, collaborating and working on various tasks"
            class="absolute inset-0 w-full h-full object-cover opacity-30" height="1080"
            src="https://storage.googleapis.com/a1aa/image/F3ojnjfUVB3ANy2Af7kh81E4bonLL7clAKgSUCeVaMqWAytnA.jpg"
            width="1920" />
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Find Your Dream Job Today
                </h1>
                <p class="text-xl md:text-2xl mb-8">
                    Connect with top employers and opportunities
                </p>
            </div>
        </div>
    </div>

    <!-- Job Categories -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="jobCategories" class="text-3xl font-bold text-center mb-12">
                Popular Job Categories
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="p-6 border rounded-lg text-center hover:shadow-lg transition-shadow">
                    <img alt="Icon representing technology jobs" class="h-12 w-12 text-indigo-600 mx-auto mb-4"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/9Nw8Y0nuof2OZyXFvVWV1N6wA6YLEb3AysK1HrIhJ4rb0c7JA.jpg"
                        width="100" />
                    <h3 class="font-semibold">
                        Technology
                    </h3>
                    <p class="text-gray-500">
                        1200+ Jobs
                    </p>
                </div>
                <div class="p-6 border rounded-lg text-center hover:shadow-lg transition-shadow">
                    <img alt="Icon representing healthcare jobs" class="h-12 w-12 text-indigo-600 mx-auto mb-4"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/wVFNOaYB0u7tNdCjm72XCaSOxr4gB8lgumx3Sek82akd0c7JA.jpg"
                        width="100" />
                    <h3 class="font-semibold">
                        Healthcare
                    </h3>
                    <p class="text-gray-500">
                        800+ Jobs
                    </p>
                </div>
                <div class="p-6 border rounded-lg text-center hover:shadow-lg transition-shadow">
                    <img alt="Icon representing finance jobs" class="h-12 w-12 text-indigo-600 mx-auto mb-4"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/LRddzesf5TizHEfTvkI4EKUUBjiF4cOejlmeMef1AaOLa0c7JA.jpg"
                        width="100" />
                    <h3 class="font-semibold">
                        Finance
                    </h3>
                    <p class="text-gray-500">
                        500+ Jobs
                    </p>
                </div>
                <div class="p-6 border rounded-lg text-center hover:shadow-lg transition-shadow">
                    <img alt="Icon representing education jobs" class="h-12 w-12 text-indigo-600 mx-auto mb-4"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/zNpZyvsDLYrLAVOGFPYca6uvBiH3WwIENpecbeTBU2Y5o52TA.jpg"
                        width="100" />
                    <h3 class="font-semibold">
                        Education
                    </h3>
                    <p class="text-gray-500">
                        300+ Jobs
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <img alt="Icon representing job search feature" class="h-8 w-8" height="100"
                            src="https://storage.googleapis.com/a1aa/image/ayIjKUqApxKpGRGGMAiXcVhBtkZkST3RE7Iyky6wd3jMau9E.jpg"
                            width="100" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">
                        Search Jobs
                    </h3>
                    <p class="text-gray-600">
                        Browse through thousands of job listings from top companies.
                    </p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <img alt="Icon representing profile creation feature" class="h-8 w-8" height="100"
                            src="https://storage.googleapis.com/a1aa/image/e7x3on7QU1XYc6gz4o3sk8fQOJvzLicPe6LOnPwtuZA7RztnA.jpg"
                            width="100" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">
                        Create Profile
                    </h3>
                    <p class="text-gray-600">
                        Build your professional profile and get noticed by employers.
                    </p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <img alt="Icon representing instant application feature" class="h-8 w-8" height="100"
                            src="https://storage.googleapis.com/a1aa/image/kdEqHnN4arpFHB5X943yGY8VbDFdIIlDkfk3ylM3mEsZ0c7JA.jpg"
                            width="100" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">
                        Apply Instantly
                    </h3>
                    <p class="text-gray-600">
                        Apply to jobs with just one click and track your applications.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Job Listings Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="latestJobs" class="text-2xl font-bold text-gray-900 mb-6 text-center">Latest Job Listings</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($jobs as $job)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">{{ $job->title }}</h3>
                        <p class="text-gray-600">{{ $job->location }}</p>
                        <p class="text-gray-600">{{ $job->job_type }}</p>
                        <a href="{{ route('login') }}" class="text-[#233f72] hover:text-[#204e53] mt-4 block">View
                            Details</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-[#233f72] py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Start Your Career Journey?</h2>
            <p class="text-indigo-100 mb-8">Join thousands of job seekers who found their dream jobs through our
                platform</p>
            <a href="{{ route('register') }}"
                class="bg-white text-[#233f72] px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50">
                Create Your Profile
            </a>
        </div>
    </div>

    <!-- Enhanced Footer -->
    <footer class="bg-[#050b1a] text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-4">For Job Seekers</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Browse Jobs</a></li>
                        <li><a href="#" class="hover:text-white">Create Resume</a></li>
                        <li><a href="#" class="hover:text-white">Job Alerts</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">For Employers</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Post a Job</a></li>
                        <li><a href="#" class="hover:text-white">Search Resumes</a></li>
                        <li><a href="#" class="hover:text-white">Employer Dashboard</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Career Advice</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- Add more footer sections -->
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p>© {{ date('Y') }} JobIn. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
