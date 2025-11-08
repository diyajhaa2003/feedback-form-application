<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\FeedbackCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Illuminate\Log\log;

class FeedbackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbackcat = FeedbackCategory::all();
        return view('backend.FeedbackCategory.index', compact('feedbackcat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.FeedbackCategory.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateddata = $request->validate([
            'category_name' => 'required',
             'feedbackquestion'=>'required|min:1',
            'feedbackquestion.*.question_text' => 'required',
            'feedbackquestion.*.input_type' => 'required|in:radio,text,rating'
        ]);

        // category
        $categorydata=FeedbackCategory::create([
            'category_name'=>$validateddata['category_name'],
        ]);
        //ques_answer
        foreach($validateddata['feedbackquestion'] as $question)
        {
            $categorydata->feedbackquestion()->create([
                 'feedback_category_id' => $categorydata->id,
                'question_text'=>$question['question_text'],
                'input_type'=>$question['input_type']
            ]);
        }
        return redirect()->route('feedback-category.index')->with('success', 'Category created sucessfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feedbackcat = FeedbackCategory::find($id);
        return view('backend.FeedbackCategory.edit', compact('feedbackcat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateddata = $request->validate([
            'category_name' => 'required',
            'feedbackquestion'=>'required|min:1',
            'feedbackquestion.*.question_text' => 'required',
            'feedbackquestion.*.input_type' => 'required|in:radio,text,rating',
        'feedbackquestion.*.id' => 'nullable|exists:feedback_questions,id',

        ]);
        $datacategory = FeedbackCategory::findOrFail($id);

        //deleteremoval question
        if($request->filled('removeIds'))
        {
            $removeIds=explode(',',$request->removeIds);
            $datacategory->feedbackquestion()->whereIn('id',$removeIds)->delete();
        }
        $datacategory->update([
            'category_name'=>$validateddata['category_name']
        ]);
        foreach($validateddata['feedbackquestion'] as $q)
        {
            if(!empty($q['id']))
            {
                $question=$datacategory->feedbackquestion()->find($q['id']);
                if($question)
                {
                    $question->update([
                        'question_text'=>$q['question_text'],
                        'input_type'=>$q['input_type']
                    ]);
                }
            }
                else
                {
                    $datacategory->feedbackquestion()->create([
                      'question_text'=>$q['question_text'],
                        'input_type'=>$q['input_type'],
                    ]);
                }
            
        }
       
        return redirect()->route('feedback-category.index')->with('success', 'Category updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = FeedbackCategory::find($id);
        $data->delete();
        return redirect()->route('feedback-category.index')->with('success', 'Category deleted sucessfully');

    }
}
