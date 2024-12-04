<x-app-layout>
    <x-slot name="header">
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

</x-app-layout>
