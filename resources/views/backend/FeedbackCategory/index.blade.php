@extends('backend.layouts.app')

@section('content')
<div class="min-h-screen py-10 px-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl p-6">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
                <i class="bi bi-folder2-open text-indigo-500"></i>
                Feedback Categories
            </h2>

            <a href="{{ route('feedback-category.create') }}"
               class="inline-flex items-center px-4 py-2 text-white font-medium rounded-lg shadow-sm"
               style="background: linear-gradient(to right, #14b8a6, #6366f1);">
                <i class="bi bi-plus-circle me-1"></i> Add Category
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-indigo-500 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Category Name</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Created At</th>
                        <th class="px-4 py-3 text-center text-sm font-medium">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($feedbackcat as $index => $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $category->category_name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $category->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <!-- Edit -->
                                <a href="{{ route('feedback-category.edit', $category->id) }}"
                                   class="inline-flex items-center px-3 py-1 text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('feedback-category.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            class="inline-flex items-center px-3 py-1 text-sm text-red-600 hover:text-red-800 font-medium">
                                        <i class="bi bi-trash3 me-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-5">
                                <i class="bi bi-info-circle me-2"></i> No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
