<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeedbackAnswer;
use App\Models\FeedbackCategory;
use App\Models\UserFeedback;
use App\Models\UserInfo;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function feedbacktypes()
    {
        $categories = FeedbackCategory::all();
    return view('frontend.feedbacktypes', compact('categories'));
    }

     public function showQuestions($id)
    {
        $category = FeedbackCategory::with('feedbackquestion')->find($id);;
    
    return view('frontend.showquestions', compact('category'));
    }

    public function submitfeedback(Request $request )
    {
      
        $validated=$request->validate([
            'username'=>'required',
            'email'=>'required',
            'answer'=>'required|array',
            'user_feedback_category_id'=>'required|exists:feedback_categories,id',
        ]);
       $userinfo = UserInfo::updateOrCreate(
    ['email' => $validated['email']], 
    ['username' => $validated['username']] );

         $user_feedback=UserFeedback::updateOrCreate([
            'user_id'=>$userinfo->id,
            'user_feedback_category_id'=>$validated['user_feedback_category_id'],
         ]);
            
        foreach($validated['answer'] as $question_id=>$answers)
        FeedbackAnswer::updateOrCreate([
            'user_id'=>$userinfo->id,
            'feedback_question_id'=>$question_id,
        ],
        [  'answer'=>$answers]
    );
      
    return redirect()->route('feedback.showinfo',['userId'=>$userinfo->id,'Categoryid'=>$validated['user_feedback_category_id']])->with('success', 'Thank you! Your feedback has been submitted.');

    }   
    public function showlistform()
    {
            $showdetails = UserInfo::paginate(10);
        return view('backend.Userdetails.feedbackformlist',compact('showdetails'));
    }
     public function showcategory($userId)
    {
            $showdetails = UserFeedback::with('feedback_Category_id')
            ->where('user_id',$userId)->get();
        return view('backend.Userdetails.usercategory',compact('showdetails'));
    }
    
    
    public function showlistformdata($userId,$categoryId)
    {
        $feedbacks=FeedbackAnswer::with(['feedback_questions.feedbackcategory','user_answer'])
        ->where('user_id',$userId)
        ->whereHas('feedback_questions',function($query) use ($categoryId)
        {
            $query->where('feedback_Category_id',$categoryId);
        })
        ->get()
        ->groupBy(function($item)
        {
            return $item->feedback_questions->feedbackcategory->category_name ?? 'Uncategorized';
        });
        
        return view('backend.Userdetails.userfeedback',compact('feedbacks'));
    }

    public function thankyou($userId,$Categoryid)
    {
        $feedbacks=FeedbackAnswer::where('user_id',$userId)
        ->whereHas('feedback_questions',function($q) use($Categoryid)
    {
  $q->where('feedback_Category_id',$Categoryid);
    })->get();
        return view('frontend.thankyou',compact('feedbacks'));
    }
}
