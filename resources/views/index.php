    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-primary-600 dark:text-primary-400">
                        Gigavel
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/docs" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Documentation</a>
             <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-primary-600 dark:text-primary-400">
                        Gigavel
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/docs" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Documentation</a>
                    <a href="/examples" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Examples</a>
                    <button @click="darkMode = !darkMode" class="p-2 rounded-full focus:outline-none">
                        <svg x-show="!darkMode" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <svg x-show="darkMode" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>           <a href="/examples" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Examples</a>
                    <button @click="darkMode = !darkMode" class="p-2 rounded-full focus:outline-none">
                        <svg x-show="!darkMode" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <svg x-show="darkMode" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                <span class="gradient-text">Build Fast.</span> 
                <span class="block">Stay Minimal.</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-10">
                Gigavel is a minimalist PHP MVC framework with HTMX + Alpine.js integration for modern web apps without the bloat.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="/install" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                    Get Started
                </a>
                <a href="https://github.com/yourusername/gigavel" class="px-6 py-3 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 font-medium rounded-lg transition-colors">
                    GitHub
                </a>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="mt-20 grid md:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Lightning Fast</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Only ~21kB of JavaScript. No build step. Just pure speed.
                </p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">HTMX Powered</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Dynamic interfaces without writing JavaScript. Just HTML.
                </p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Laravel-like</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Familiar MVC structure without the complexity.
                </p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 mt-20 py-8 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500 dark:text-gray-400">
                &copy; <?= date('Y') ?> Gigavel. The minimalist PHP framework.
            </p>
        </div>
    </footer>

    <!-- Initialize theme -->
    <script>
        document.addEventListener('alpine:init', () => {
            const savedMode = localStorage.getItem('darkMode') === 'true';
            if (savedMode) {
                document.documentElement.classList.add('dark');
            }
        });
    </script>