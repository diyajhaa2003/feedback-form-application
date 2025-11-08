@extends('frontend.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-10 px-6">
      <!-- Page Header -->
    <div class="flex justify-between items-center max-w-5xl mx-auto mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">
            Feedback Details
        </h2>
        <a href="{{ url('/feedback/types') }}" 
           class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 flex items-center gap-2">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">
        Thank You! Your Feedback
    </h2>

   @if(session('success'))
         <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    <Script>
        setTimeout(() => {
        var msg=document.getElementById('success-message');
        if(msg) msg.style.display="none";
        }, 3000);
    </Script>
    @endif

    @php
        $user = $feedbacks->first()?->user_answer;
        $categoryName = $feedbacks->first()?->feedback_questions->feedbackcategory->category_name;
    @endphp

    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl p-6 space-y-4">
        <!-- User Info -->
        <div class="border-b pb-3">
            <span class="text-gray-700 font-semibold">Name: <span class="font-normal">{{ $user->username }}</span></span><br>
            <span class="text-gray-700 font-semibold">Email: <span class="font-normal">{{ $user->email }}</span></span><br>
            <span class="text-gray-700 font-semibold">Category: <span class="font-normal">{{ $categoryName }}</span></span>
        </div>
        <div class="space-y-3">
            @foreach($feedbacks as $feedback)
                <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                    <span class="text-gray-800 font-medium">Q: {{ $feedback->feedback_questions->question_text }}</span>
                    <p class="text-teal-600 font-semibold pl-2 mt-1">A: {{ $feedback->answer }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-gray-500 text-sm text-right">
            Submitted on: {{ $feedbacks->first()->created_at->format('d M Y, h:i A') }}
        </div>
    </div>
</div>
]@endsection
