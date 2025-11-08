<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
        protected $fillable = ['feedback_Category_id', 'question_text', 'input_type'];
   public function feedbackcategory()
    {
        return $this->belongsTo(FeedbackCategory::class, 'feedback_Category_id', 'id');
    }
     public function feedback_answer()
    {
            return $this->hasMany(FeedbackAnswer::class, 'feedback_question_id', 'id');

    }
}
