<nav class="bg-[#233f72] border-b border-white-200 sticky top-0 w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        {{-- Logo/Brand --}}
        <div class="flex items-center">
            <h1 class="text-4xl font-bold text-white mb-2 tracking-tight font-['Poppins']">
                <i class="fas fa-briefcase mr-3 text-white"></i>JobIn
            </h1>
        </div>

        {{-- Mobile menu button --}}
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white-500 rounded-lg md:hidden hover:bg-white-100 focus:outline-none focus:ring-2 focus:ring-white-200" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        {{-- Navigation Menu --}}
        <div class="hidden w-full md:block md:w-auto font-['Inter'] text-center" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg bg-[#233f72] md:flex-row md:space-x-8 md:mt-0 md:border-0">
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li>
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" class="text-white flex items-center">
                            <ion-icon name="people-sharp" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Manage Users') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('admin.listEmployers')" :active="request()->routeIs('admin.listEmployers')" class="text-white flex items-center">
                            <ion-icon name="people-sharp" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Manage Employers') }}</span>
                        </x-nav-link>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role === 'employer')
                    <li>
                        <x-nav-link :href="route('jobPost')" :active="request()->routeIs('jobPost')" class="text-white flex items-center">
                            <ion-icon name="briefcase-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Job Posts') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('employer.index')" :active="request()->routeIs('employer.create')" class="text-white flex items-center">
                            <ion-icon name="business-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Company Profile') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('employer.applications')" :active="request()->routeIs('employer.applications')" class="text-white flex items-center">
                            <ion-icon name="people-circle-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Applications') }}</span>
                        </x-nav-link>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role === 'job_seeker')
                <li>
                    <x-nav-link :href="route('jobSeeker.create')" :active="request()->routeIs('jobSeeker.create')" class="text-white flex items-center">
                        <ion-icon name="people-sharp" class="w-5 h-5 text-white mr-2"></ion-icon>
                        <span class="ms-3">{{ __('Profile') }}</span>
                    </x-nav-link>
                </li>
                    <li>
                        <x-nav-link :href="route('jobseeker.job.list')" :active="request()->routeIs('jobseeker.job.list')" class="text-white flex items-center">
                            <ion-icon name="search-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Find Jobs') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('jobSeeker.applications')" :active="request()->routeIs('jobSeeker.applications')" class="text-white flex items-center">
                            <ion-icon name="clipboard-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Applications') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('jobseeker.favorites')" :active="request()->routeIs('jobseeker.favorites')" class="text-white flex items-center">
                            <ion-icon name="heart-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                            <span>{{ __('Favorites') }}</span>
                        </x-nav-link>
                    </li>
                @endif

                {{-- User Profile Dropdown --}}
                <li>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#233f72] hover:text-[#b0b7c5] focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->username }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                <ion-icon name="person-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                                <span>{{ __('Profile') }}</span>
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center">
                                    <ion-icon name="log-out-outline" class="w-5 h-5 text-white mr-2"></ion-icon>
                                    <span>{{ __('Logout') }}</span>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Add this to the head section of your layout --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

