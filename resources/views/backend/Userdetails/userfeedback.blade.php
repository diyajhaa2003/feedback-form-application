<div class="space-y-6">
    @forelse ($feedbacks as $categoryName => $categoryFeedbacks)
        <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
            <table class="table-auto w-full text-gray-700">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 text-left">Question</th>
                        <th class="p-2 text-left">Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryFeedbacks as $feedback)
                        <tr class="border-b">
                            <td class="p-2">{{ $feedback->feedback_questions->question_text }}</td>
                            <td class="p-2">{{ $feedback->answer }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <div class="text-center text-gray-500 py-10">
            <i class="bi bi-info-circle me-2"></i> No feedback found.
        </div>
    @endforelse
</div>
