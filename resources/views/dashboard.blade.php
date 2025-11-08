<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-teal-500 via-indigo-500 to-blue-600 text-gray-900">    
        <!-- Main Content -->
        <main class="flex-1 relative p-10 text-white overflow-y-auto">
         <h1 class="text-3xl font-bold mb-6">Welcome, Admin </h1>
                <p class="mb-10 text-lg text-indigo-100">Here’s a quick overview of your feedback system.</p>

            <!-- Top Navbar -->
            <div class="absolute top-0 right-0 mt-4 mr-8 z-10">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-white/20 text-white rounded-lg shadow hover:bg-white/30 transition">
                            <div class="font-semibold">{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Dashboard Body -->
            <div class="pt-12"> 
               
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">

                    <!-- Card 1 -->
                    <div class="bg-white/20 backdrop-blur-md p-6 rounded-2xl shadow hover:shadow-xl hover:scale-105 transition">
                        <h3 class="text-xl font-semibold text-white mb-2">Feedback Forms</h3>
                        <p class="text-indigo-100 mb-4">Manage and review user feedback submissions.</p>
                        <a href="/feedback/list" class="inline-block px-4 py-2 bg-indigo-600 rounded-md font-semibold text-white hover:bg-indigo-700 transition">View</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white/20 backdrop-blur-md p-6 rounded-2xl shadow hover:shadow-xl hover:scale-105 transition">
                        <h3 class="text-xl font-semibold text-white mb-2">Categories</h3>
                        <p class="text-indigo-100 mb-4">Add or modify feedback categories easily.</p>
                        <a href="/admin/feedback-category" class="inline-block px-4 py-2 bg-teal-600 rounded-md font-semibold text-white hover:bg-teal-700 transition">Manage</a>
                    </div>
                </div>

                <div class="mt-12 text-center text-indigo-100">
                    <p>© {{ date('Y') }} Feedback Management Dashboard</p>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
