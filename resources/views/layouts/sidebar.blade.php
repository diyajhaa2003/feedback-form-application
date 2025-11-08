    <!-- Sidebar -->
        <aside class="w-64 bg-white/90 backdrop-blur-lg shadow-xl flex flex-col justify-between">
            
            <div>
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-indigo-700 text-center">Admin Panel</h2>
                    
                </div>
                <nav class="p-4 space-y-3">
                    <a href="/dashboard" class="block px-4 py-2 rounded-lg text-gray-700 font-semibold hover:bg-indigo-100 hover:text-indigo-700 transition"></i>Dashboard</a>
                    <a href="{{ route('feedback.list') }}" class="block px-4 py-2 rounded-lg text-gray-700 font-semibold hover:bg-teal-100 hover:text-teal-700 transition">Feedback Forms</a>
                    <a href="{{ url('/admin/feedback-category') }}" class="block px-4 py-2 rounded-lg text-gray-700 font-semibold hover:bg-blue-100 hover:text-blue-700 transition">Categories</a>
                    </nav>
            </div>
            <div class="p-4 border-t border-gray-200 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>
