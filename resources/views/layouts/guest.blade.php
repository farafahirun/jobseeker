<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Additional Fonts & Icons -->
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                overflow: hidden;
                background-color: #233f72;
            }

            .morphic-shape {
                position: absolute;
                /* background: rgba(255, 255, 255, 0.1); */
                /* backdrop-filter: blur(8px); */
                /* border-radius: 50%; */
                transition: all 0.5s ease;
            }
            .feature-icon {
                transition: all 0.3s ease;
            }
            .feature-icon:hover {
                transform: translateY(-5px);
                color: white;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen morphic-bg flex flex-col items-center justify-between py-4">
            <!-- Animated Background Shapes -->
            <div class="morphic-shape w-96 h-96 -top-20 -left-20 opacity-30" style="animation: float 15s infinite ease-in-out"></div>
            <div class="morphic-shape w-[500px] h-[500px] -bottom-32 -right-32 opacity-20" style="animation: float 20s infinite ease-in-out reverse"></div>
            
            <!-- Logo Section -->
            <div class="relative z-10 pt-4 text-center transform hover:scale-105 transition-transform duration-300">
                <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">
                    <i class="fas fa-briefcase mr-3"></i>JobIn
                </h1>
                <p class="text-white/90 text-base">Your Gateway to Professional Success</p>
            </div>

            <!-- Main Content Card -->
            <div class="relative z-10 w-full max-w-md transform hover:scale-[1.02] transition-all duration-300">
                <div class="backdrop-blur-xl bg-white/15 p-6 rounded-3xl shadow-2xl border border-white/20">
                    {{ $slot }}
                </div>
            </div>

            <!-- Feature Icons -->
            <div class="relative z-10 grid grid-cols-3 gap-8 text-white/90 text-center max-w-2xl mx-auto px-4">
                <div class="feature-icon">
                    <i class="fas fa-search-dollar mb-2 text-2xl"></i>
                    <p class="text-xs font-medium">Discover Opportunities</p>
                </div>
                <div class="feature-icon">
                    <i class="fas fa-handshake mb-2 text-2xl"></i>
                    <p class="text-xs font-medium">Network & Connect</p>
                </div>
                <div class="feature-icon">
                    <i class="fas fa-rocket mb-2 text-2xl"></i>
                    <p class="text-xs font-medium">Accelerate Growth</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 text-white/80 text-xs text-center pb-2">
                <p class="font-medium">&copy; {{ date('Y') }} JobIn. All rights reserved.</p>
                <div class="mt-2 space-x-6">
                    <a href="#" class="hover:text-white transition-colors duration-300">Terms</a>
                    <a href="#" class="hover:text-white transition-colors duration-300">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors duration-300">Support</a>
                </div>
            </div>
        </div>
    </body>
</html>
