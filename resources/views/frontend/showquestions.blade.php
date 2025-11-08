@extends('frontend.layouts.app')
@section('title', $category->category_name.' Feedback')
@section('content')
  <!-- Header -->
  <div class="text-center mb-8 mt-4">
      <h2 class="text-3xl font-bold text-gray-800 mb-2">
          <i class="bi bi-chat-dots text-indigo-600"></i>
          {{ $category->category_name }} Feedback
      </h2>
      <p class="text-gray-500">Please answer the following questions.</p>
  </div>
<div class="max-w-2xl mx-auto">
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

  <!-- Feedback Form -->
  <form action="{{ route('feedback.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded shadow space-y-6">
      @csrf
      <input type="hidden" name="user_feedback_category_id" value="{{ $category->id }}">

      <!--Info -->
      <div class="border border-gray-200 p-4 rounded">
          <h3 class="text-lg font-semibold mb-4 text-indigo-600">Personal Information</h3>
          <div class="mb-4">
              <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
              <input type="text" name="username" id="name" required
                     class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>

          <div class="mb-4">
              <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
              <input type="email" name="email" id="email" required
                     class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>

         
      </div>

      <!--feed-->
      <div class="border border-gray-200 p-4 rounded">
          <h3 class="text-lg font-semibold mb-4 text-indigo-600">Feedback Questions</h3>

          @foreach($category->feedbackquestion as $question)
              <div class="mb-4">
                  <label class="block font-medium text-gray-800 mb-1">{{ $question->question_text }}</label>
                      @if($question->input_type == 'text')
                      <input type="text" name="answer[{{ $question->id }}]" class="w-full border p-2 rounded" required>
                  @elseif($question->input_type == 'radio')
                      <div class="flex gap-4">
                          <label><input type="radio" name="answer[{{ $question->id }}]" value="Yes" required> Yes</label>
                          <label><input type="radio" name="answer[{{ $question->id }}]" value="No" required> No</label>
                      </div>
                  @elseif($question->input_type == 'rating')
                      <input type="number" min="1" max="5" name="answer[{{ $question->id }}]" class="w-full border p-2 rounded" required>
                  @endif
              </div>
          @endforeach
      </div>

      <!-- Submit Button -->
      <div class="text-center">
          <button type="submit"
                  class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
              Submit Feedback
          </button>
      </div>
  </form>
  </div>
@endsection
