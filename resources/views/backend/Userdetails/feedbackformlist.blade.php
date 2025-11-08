@extends('backend.layouts.app')

@section('content')
<div class="min-h-screen py-10 px-6" x-data="{openModal:false,feedbackhtml:''}">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl p-6">
                <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
                <i class="bi bi-folder2-open text-indigo-500"></i>
                Users Information...
            </h2>

        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-indigo-500 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">User Name</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">User Email</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">View User Feedback</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                  @forelse($showdetails as $index => $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $category->username }}</td>
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $category->email }}</td>
                            <td class="px-4 py-3">
                               
                               <a href="{{ route('feedback.userfeedback', ['userId'=>$category->id]) }}"
                                   class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
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
