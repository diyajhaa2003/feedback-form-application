<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Feedback System')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-gradient-to-r from-teal-500 to-indigo-600 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold flex items-center gap-2">
                <i class="bi bi-chat-heart"></i> Feedback Portal
            </h1>
            <nav class="flex items-center gap-6 text-sm font-medium">
                <a href="/" class="hover:underline">Home</a>
                <a href="feedback/types" class="hover:underline">Categories</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-[80vh]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t mt-10 py-4">
        <div class="max-w-6xl mx-auto text-center text-gray-600 text-sm">
            © {{ date('Y') }} Feedback System. All rights reserved.
        </div>
    </footer>

</body>
</html>
