@extends('backend.layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div x-data="{ feedbackquestion: [{text:'',input_type:''}] }" class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800 flex items-center justify-center gap-2">
            <i class="bi bi-chat-square-text text-indigo-500"></i>
            Add Feedback Category
        </h2>

        <form action="{{ route('feedback-category.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Category Name -->
            <div>
                <label for="category_name" class="block text-gray-700 font-medium mb-1">
                    <i class="bi bi-folder2-open text-teal-600 mr-1"></i> Category Name
                </label>
                <input type="text" id="category_name" name="category_name"
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                       placeholder="e.g. Service Quality" required>
            </div>

            <template x-for="(question, index) in feedbackquestion" :key="index">
                <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50 relative space-y-3 mt-3">
                    
                    <!-- Question Text -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">
                            <i class="bi bi-question-circle text-indigo-600 mr-1"></i> Question Text
                        </label>
                        <textarea x-model="question.question_text"
                                  :name="'feedbackquestion[' + index + '][question_text]'"
                                  rows="2"
                                  class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                                  placeholder="Enter question..." required></textarea>
                    </div>

                    <!-- Input Type -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">
                            <i class="bi bi-ui-radios text-teal-600 mr-1"></i> Input Type
                        </label>
                        <select  x-model="question.input_type"
                                 :name="'feedbackquestion[' + index + '][input_type]'"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                                required>
                            <option value="">Choose Input Type</option>
                            <option value="text">Text</option>
                            <option value="radio">Radio</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>

                    <!-- Remove Button -->
                    <button type="button" x-on:click="feedbackquestion.splice(index, 1)"
                            class="absolute top-2 right-2 text-red-500 hover:text-red-700">
                        <i class="bi bi-x-circle text-xl"></i>
                    </button>
                </div>
            </template>

            <!-- Add Question Button -->
            <div class="text-right">
                <button type="button"
                        x-on:click="feedbackquestion.push({ text: '', input_type: '' })"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-lg shadow-sm"
                        style="background: linear-gradient(to right, #14b8a6, #6366f1);">
                    <i class="bi bi-plus-circle mr-1"></i> Add Question
                </button>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('feedback-category.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 flex items-center gap-1">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2 text-white font-medium rounded-lg shadow-sm flex items-center gap-1"
                        style="background: linear-gradient(to right, #14b8a6, #6366f1);">
                    <i class="bi bi-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
