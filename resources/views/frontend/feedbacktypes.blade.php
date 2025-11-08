@extends('frontend.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-10 px-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">
        Choose Feedback Category
    </h2>

    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6 max-w-5xl mx-auto">
        @foreach ($categories as $category)
        <a href="{{ route('feedback.showQuestions',$category->id) }}"
           class="bg-white border border-gray-200 shadow-sm hover:shadow-md p-6 rounded-xl transition-all duration-200 hover:scale-105">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-800">
                   {{ $category->category_name }}
                </h3>
                <i class="bi bi-arrow-right-circle text-indigo-600 text-xl"></i>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
